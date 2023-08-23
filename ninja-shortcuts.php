<?php


/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Ninja Shortcuts
 * Plugin URI:        https://github.com/nadim-cse
 * Description:       An Addon for help ninja support agents to nagivate quickly.
 * Version:           1.0
 * Author:            Nadim
 * Author URI:        https://profiles.wordpress.org/nadimcse/
 * Text Domain:       ns_addon
 */

defined('ABSPATH') or die;

define('NINJA_SHORTCUTS_VERSION', 1.0);
define('NINJA_SHORTCUTS_DIR_PATH', plugin_dir_path(__FILE__));
define('NINJA_SHORTCUTS_DIR_URL', plugin_dir_url(__FILE__));

if(!class_exists('NinjaShortcuts')){
    class NinjaShortcuts
    {

        public function boot()
        {

            if (!defined('FLUENTFORM') || !defined('FLUENTCRM')) {
                return $this->injectDependency();
            }

            $this->includeFiles();

            $this->registerComponents();
        }

        protected function includeFiles()
        {
            include_once NINJA_SHORTCUTS_DIR_PATH . 'inc/MenuSettings.php';
        }

        protected function registerComponents()
        {
            new \NinjaShortCuts\inc\MenuSettings();
        }

        /**
         * Notify the user about the FluentForm dependency and instructs to install it.
         */
        protected function injectDependency()
        {
            add_action('admin_notices', function () {

                $class = 'notice notice-error';
                $message = 'Please install our plugins such Fluent Forms and FluentCRM';
                printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), $message);
            });
        }

    }
}

add_action( 'init', function (){
    $adminInit = new NinjaShortcuts();
    $adminInit->boot();
}, 10 );
