=== Contact Form 7 - CleverReach® Integration ===
Contributors: pixelarbeit
Tags: contact form 7, cf7, cleverreach, contact form 7 addon, contact form 7 integration
Tested up to: 5.0
Requires at least: 4.6
Requires PHP: 5.5
Stable tag: 2.1.1
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Add new recipients to cleverreach from your Contact Form 7 forms.

== Description ==

Connects your Contact Form 7 forms with your CleverReach® account.

= Features =
* Add/update CleverReach® recipients when a form is submitted including custom CleverReach® fields
* Easy mapping between CF7 fields and CleverReach® fields
* Easy connection to CleverReach® (Only credentials are needed)
* Invidual settings per form (e.g. group, form, mapping, ...)
* Choose between Single Opt-In and Double Opt-In
* Choose a "required field" for CleverReach® submission

= Requires =
* PHP >= 5.5
* PHP cURL Extension
* Contact Form 7 >= 4.5
* CleverReach® Account

= Github =
This project is on github.
<https://github.com/pixelarbeit/wordpress-contact-form-7-cleverreach>

= Support =
If you find a bug please open an issue on github.

==Configuration==
1. Go to Settings > CF7 to CleverReach®
1. Click "Get CleverReach® API token". You will be redirected to CleverReach®.
1. Authenticate against CleverReach® and give access to the plugin. You will be redirected back to Wordpress and should see the generated API token.
1. Configure your forms via Contact -> "Your form" > CleverReach® tab

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==
1. Get CleverReach® API Token via settings page
2. Configure form

== Changelog ==

= 2.1.1 =
* Fix bug with static var access

= 2.1 =
* Fix bug for new api token generation

= 2.0 =
* No need for custom app anymore
* Select fields, form, group from list instead of giving an id.
* Added source, double opt-in and tags option

= 1.1.2 =
* Fix for checkboxes and radio buttons as input

= 1.1.1 =
* Transfer api token from old option field to new one

= 1.1 =
* Added cleverreach api token generation on settings page
* Fixed case-sensitivity of attributes

= 1.0 =
* First version

== Upgrade Notice ==
-
