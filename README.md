# Uberblogr

![GitHub release](https://img.shields.io/github/release/mauricerenck/uberblogr.svg?maxAge=1800) ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-4%2B-black.svg)

![Header](/assets/uberblogr-header.png)

This Kirby plugin will ping uberblogr.com whenever you publish a page.

---

## Installation

Use one of these methods to install the plugin:

- composer (recommended): `composer require mauricerenck/uberblogr`
- zip file: unzip [main.zip](https://github.com/mauricerenck/uberblogr/releases/latest) as folder `site/plugins/uberblogr`

## Usage

After installing the plugin, it will ping uberblogr.com whenever you publish a page.

If you are **not** a member of the uberblogr webring, you first have to register your site at [uberblogr.com](https://uberblogr.com/).
You have to set the URL your registered with in your `config.php` file:

```php
<?php

return [
    "mauricerenck.uberblogr" => [
        'url' => 'https://YOUR-BLOG-URL',
    ],
];
```

Use the full URL. So if you registered with `https://example.com/en/blog` you also need to use that URL in your `config.php` file.

## Restricting templates

You may not want to ping the pages with every page you publish. For example a new legal page should not result in a ping, but a new blog post should.

You have two options:

- Allow specific templates to ping
- Block specific templates from sending a ping

Setting `templates.allowed` will allow only the templates listed in the array to ping, no other template will send a ping.

```php
<?php
'mauricerenck.uberblogr.templates.allowed' => ['post', 'note'],
```

Setting `templates.blocked` will allow all templates except the ones listed in the array to ping.

```php
<?php
'mauricerenck.uberblogr.templates.blocked' => ['legal'],
```

Leave both options away if you don't want any restrictions.

## Options

Please make sure to prefix all options with `mauricerenck.uberblogr` or use the array notation.

| Option              | Default | Description                                                     |
| ------------------- | ------- | --------------------------------------------------------------- |
| `url`               | `''`    | The URL of your blog                                            |
| `templates.allowed` | `[]`    | A list of template/blueprint names which should send a ping     |
| `templates.blocked` | `[]`    | A list of template/blueprint names which should not send a ping |
