<?php

namespace mauricerenck\Uberblogr;

use Kirby\Http\Remote;
use Exception;

return [
    'page.changeStatus:after' => function ($newPage, $oldPage) {
        $kirbyUrl = kirby()->url();

        if (!$newPage->isDraft() && $oldPage->isDraft()) {

            $pingUrl = 'https://ping.uberblogr.com/';
            $blogUrl = option('mauricerenck.uberblogr.url', $kirbyUrl);
            $allowedTemplates = option('mauricerenck.uberblogr.templates.allowed', []);
            $blockedTemplates = option('mauricerenck.uberblogr.templates.blocked', []);

            if (count($blockedTemplates) > 0 && in_array($newPage->intendedTemplate()->name(), $blockedTemplates)) {
                return;
            }

            if (count($allowedTemplates) > 0 && !in_array($newPage->intendedTemplate()->name(), $allowedTemplates)) {
                return;
            }

            try {
                Remote::request($pingUrl . '?url=' . $blogUrl, [
                    'method' => 'POST',
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
                    ],
                    'data' => [
                        'url' => $blogUrl,
                    ],
                ]);
            } catch (Exception $e) {
                throw new Exception('Error sending ping: ' . $e->getMessage());
            }
        }
    },
];
