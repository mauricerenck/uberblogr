<?php

namespace mauricerenck\Uberblogr;

use Kirby\Cms\App as Kirby;

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('mauricerenck/uberblogr', [
    'hooks' => require_once __DIR__ . '/plugin/hooks.php',
]);
