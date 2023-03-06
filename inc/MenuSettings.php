<?php

namespace NinjaShortcuts\inc;
use FluentForm\Framework\Helpers\ArrayHelper;

class MenuSettings
{
    public function __construct()
    {
        add_action( 'admin_head', [$this,'add_style'] );
        add_action( 'admin_footer', [$this,'add_js'] );
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

    public function add_js(){

        $script = "<script type='text/javascript'>

                       function copyLoremIpsum(givenLength){
                           
                           let text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
                            
                           let newLength;
                           
                           if(givenLength == 0){
                               newLength = prompt('Enter value', '');
                           }else{
                               newLength = givenLength;
                           }
                           let filteredText = text.slice(0, newLength);
                            setTimeout(() => {
                                   navigator.clipboard.writeText(filteredText).then(() => {
                                      alert(newLength+' characters copied to clipboard');
                                      /* Resolved - text copied to clipboard successfully */
                                    },() => {
                                      console.error('Failed to copy');
                                      /* Rejected - text failed to copy to the clipboard */
                                    });
                            }, 500);
                       }
                  </script>";
        echo $script;
    }

    public function NinjaSupportGetMenuItems(){

        $menu_items = [

            'ninja-support-shortcuts-menu' => [
                'parent'     => '',
                'title'      => '<span><img src="'.NINJA_SHORTCUTS_DIR_URL.'assets/images/WPMN.svg" style="height: 18px;margin: -3px;"></span><span style="margin-left: 6px;">Ninja Support Shortcuts</span>',
                'url'        => '#',
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

            'lorem-ipsum-shortcut' => [
                'parent' => 'ninja-support-shortcuts-menu',
                'title'  => 'Lorem Ipsum Clipboard',
                'url'    => '#',
            ],

            'lorem-ipsum-50' => [
                'parent' => 'lorem-ipsum-shortcut',
                'title'  => 'Copy 50 Characters',
                'url'    => '#',
                'meta'   => [
                     'onclick' => 'copyLoremIpsum(50); return false;',
                ]
            ],

            'lorem-ipsum-100' => [
                'parent' => 'lorem-ipsum-shortcut',
                'title'  => 'Copy 100 Characters',
                'url'    => '#',
                'meta'   => [
                    'onclick' => 'copyLoremIpsum(100); return false;',
                ]
            ],

            'lorem-ipsum-200' => [
                'parent' => 'lorem-ipsum-shortcut',
                'title'  => 'Copy 200 Characters',
                'url'    => '#',
                'meta'   => [
                    'onclick' => 'copyLoremIpsum(200); return false;',
                ]
            ],

            'lorem-ipsum-500' => [
                'parent' => 'lorem-ipsum-shortcut',
                'title'  => 'Copy 500 Characters',
                'url'    => '#',
                'meta'   => [
                    'onclick' => 'copyLoremIpsum(500); return false;',
                ]
            ],

            'lorem-ipsum-customize' => [
                'parent' => 'lorem-ipsum-shortcut',
                'title'  => 'Enter value for customize length',
                'url'    => '#',
                'meta'   => [
                    'onclick' => 'copyLoremIpsum(0); return false;',
                ]
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
                    'meta'    => ArrayHelper::get($item, 'meta')
                ]
            );
        }


    }

}