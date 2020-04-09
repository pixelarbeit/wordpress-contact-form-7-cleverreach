<?php
/*
Plugin Name: CleverReach Integration for Contact Form 7
Description: Send Contact Form 7 form data to CleverReach
Version:     2.2
Author:      pixelarbeit
Author URI:  https://pixelarbeit.de
*/

require __DIR__ . '/vendor/autoload.php';

use pxlrbt\Cf7Cleverreach\Plugin;


$plugin = Plugin::getInstance();
$plugin->init();
