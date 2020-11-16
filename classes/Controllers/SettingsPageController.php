<?php

namespace pxlrbt\Cf7Cleverreach\Controllers;

use pxlrbt\Cleverreach\Api as CleverreachApi;
use pxlrbt\Cf7Cleverreach\Plugin;
use pxlrbt\Cf7Cleverreach\CF7\ApiCredentials;
use WPCF7_ContactForm;
use Exception;



class SettingsPageController
{
    public static $instance;



    private function __construct() {}



    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }



	public function init($plugin)
	{
        $this->plugin = $plugin;
        $this->notifier = $plugin->notifier;
        $this->logger = $plugin->logger;
        add_action('admin_menu', [$this, 'registerMenu']);
    }



    public function registerMenu()
    {
        add_submenu_page(
            'wpcf7',
            'CF7 to CleverReach',
            'CF7 to CleverReach',
            'manage_options',
            'cf7-cleverreach',
            [$this, 'printPage']
        );
    }



    public function printPage()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_GET['code'])) {
            $this->getApiToken($_GET['code']);
        }

        include __DIR__ . '/../../views/settings-page.php';
    }



    public function getApiToken($code)
    {
        $api = $this->plugin->getApi();

        $redirectUrl = esc_url(admin_url('admin.php?page=cf7-cleverreach'));

        try {
            $result = $api->getApiToken(Plugin::$clientId, Plugin::$clientSecret, $code, $redirectUrl);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage(), [$e]);
            $this->notifier->printNotification('error', $e->getMessage());
            return;
        }

        if (isset($result->error_description)) {
            $this->logger->error($e->error_description, [$result]);
            $this->notifier->printNotification('error', 'Could not retrieve api token: ' . $result->error_description);
            return;
        }

        if (isset($result->access_token)) {
            ApiCredentials::upda
            update_option('wpcf7-cleverreach_api-token', $result->access_token);
            update_option('wpcf7-cleverreach_api-refresh-token', $result->refresh_token);
            update_option('wpcf7-cleverreach_api-expires', time() + $result->expires_in);
            $this->notifier->printNotification('success', 'Api token updated');
        }
    }
}
