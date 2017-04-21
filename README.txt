=== Line Login ===
Contributors: koobitor
Donate link: https://paypal.me/koobitor/10
Tags: Line, Line chat, Line login, woocommerce, line ajax, line registration, buddypress, registration form, login form, login widget
Requires at least: 3.6
Tested up to: 4.7.4

Line Login. Simple adds a line login button into wp-login.php.

== Description ==

If you just need a line login button in your wp-login.php to login/register users, this is your plugin. Lightweight plugin that won't bloat your site with unnecessary functions. Developer friendly and easy to expand.

To add line button on a page use shortcode `[linel_login_button redirect="" hide_if_logged=""]`

If you need to add a line login in your template or link a Line account to an existing profile use the following code:
`<?php do_action('line_login_button');?>`

If you want to show a disconnect button to remove line connection from a user profile use this:
`<?php do_action('line_disconnect_button');?>`

= GitHub =

Please contribute on [https://github.com/koobitor/wp-line-login](https://github.com/koobitor/wp-line-login)

== Installation ==

1. Install plugin zip using `/wp-admin/plugin-install.php` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Line Login and enter your line app ID
4. Place `<?php do_action('line_login_button');?>` in your templates if you need it somewhere else than wp-login.php

== Screenshots ==

== Changelog ==