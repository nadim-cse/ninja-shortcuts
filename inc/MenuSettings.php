<?php

namespace NinjaShortcuts\inc;
use FluentForm\Framework\Helpers\ArrayHelper;

class MenuSettings
{
    public function __construct()
    {
        add_action( 'admin_head', [$this,'add_style'] );
        add_action('admin_bar_menu', [$this, 'ninja_support_shortcuts'], 999);

    }

    public function add_style(){
        $styles = "<style type='text/css'>
                        .ab-item .ab-empty-item{
                            background: red !important;
                            color: white !important;
                            font-family: inherit !important;
                         }
                         .ns_addon_icon{
                            height: 15px !important;
                         }
                    </style>";
        echo $styles;
    }

    public function NinjaSupportGetMenuItems(){

        $menu_items = [

            'ninja-support-shortcuts-menu' => [
                'parent'     => '',
                'title'      => '<img src="'.NINJA_SHORTCUTS_DIR_URL.'assets/images/WPMN.svg" / clss="ns_addon_icon"><span>Ninja Support Shortcuts</span>',
                'url'        => false,
                'meta'       => array( 'background'=>'white' )
            ],

            'fluent-forms-home' => [
                'parent'     => 'ninja-support-shortcuts-menu',
                'title'      => 'Fluent Forms',
                'url'        => 'admin.php?page=fluent_forms',
            ],

            'fluent-crm-home' => [
                'parent'     => 'ninja-support-shortcuts-menu',
                'title'      => 'FluentCRM',
                'url'        => '#',
            ],

            'fluent-crm-cron-job-status' => [
                'parent' => 'fluent-crm-home',
                'title'  => 'Cron Job Status',
                'url'    => 'admin.php?page=fluentcrm-admin#/settings/settings_tools',
            ],

            'wp-site-health-status' => [
                'parent' => 'fluent-crm-home',
                'title'  => 'WP Site Health',
                'url'    => 'site-health.php',
            ],

            'wp-site-health-server' => [
                'parent' => 'fluent-crm-home',
                'title'  => 'WP Server Info',
                'url'    => 'site-health.php?tab=debug',
            ],

            'fluent-smtp-home' => [
                'parent' => 'ninja-support-shortcuts-menu',
                'title'  => 'Fluent SMTP Settings',
                'url'    => '#',
            ],

            'fluent-smtp-connections' => [
                'parent' => 'fluent-smtp-home',
                'title'  => 'SMTP Connections',
                'url'    => 'admin.php?page=fluent-mail#/connections',
            ],

            'email-log' => [
                'parent' => 'fluent-smtp-home',
                'title'  => 'Email Logs',
                'url'    => 'admin.php?page=fluent-mail#/logs',
            ],

            'license-of-products' => [
                'parent' => 'ninja-support-shortcuts-menu',
                'title'  => 'Product Licenses',
                'url'    => '#',
            ],

            'license-of-fluent-forms' => [
                'parent' => 'license-of-products',
                'title'  => 'Fluent Forms',
                'url'    => 'admin.php?page=fluent_forms_add_ons&sub_page=fluentform-pro-add-on',
            ],

            'license-of-ninja-tables' => [
                'parent' => 'license-of-products',
                'title'  => 'Ninja Tables',
                'url'    => 'admin.php?page=ninja_tables#/tools/licensing',
            ],

            'license-of-fluent-crm' => [
                'parent' => 'license-of-products',
                'title'  => 'FluentCRM',
                'url'    => 'admin.php?page=fluentcrm-admin#/settings/license_settings',
            ],

            'license-of-fluent-support' => [
                'parent' => 'license-of-products',
                'title'  => 'Fluent Support',
                'url'    => 'admin.php?page=fluent-support#/settings/license-management',
            ],

            'license-of-paymattic' => [
                'parent' => 'license-of-products',
                'title'  => 'Paymattic',
                'url'    => 'admin.php?page=wppayform_settings#license',
            ],



        ];

        return apply_filters('ns_addon/add_menu_items', $menu_items);

    }

    public function ninja_support_shortcuts()
    {
        global $wp_admin_bar;


        $items = $this->NinjaSupportGetMenuItems();

        if(empty($items)){
            return;
        }
        foreach ($items as $itemKey => $item) {
            $wp_admin_bar->add_menu(
                [
                    'id'     => $itemKey,
                    'parent' => ArrayHelper::get($item, 'parent'),
                    'title'  => ArrayHelper::get($item, 'title'),
                    'href'   => admin_url(ArrayHelper::get($item, 'url')),
                ]
            );
        }


    }

}