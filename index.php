<?php
/*
Plugin Name: Social Share
Plugin URI: https://github.com/PaulCrespoC/osclass-social-share
Description: This plugin adds a simple item social share
Version: 1.0.0
Author: DevStdio
Author URI: https://www.devstdio.com/
Plugin update URI: social-share_2
*/

require_once('classes/Route.php');

$settings = new Route('social_share', 'settings', 'Social Share');
$settings->add();
$settings->hook();

$settings_post = new Route('social_share', 'post', 'Post');
$settings_post->add();

function socialShareImport()
{
    if (osc_item_id() !== 0) {
        osc_register_script('social_share_script', osc_plugin_url('social_share/assets/social-share.js') . 'social-share.js');
        osc_enqueue_script('social_share_script');
        osc_enqueue_style('social_share_styles', osc_plugin_url('social_share/assets/social-share.css') . 'social-share.css');
    }
}

osc_add_hook('header', 'socialShareImport');

function socialShareLoad()
{
    require_once('views/links.php');
}
osc_add_hook('item_detail', 'socialShareLoad');

function socialShareInstall()
{
    osc_set_preference('social_share_active_links',
        json_encode(
        [
            'Facebook' => 'on',
            'Twitter' => 'on',
            'Whatsapp' => 'on',
            'Pinterest' => 'on',
        ]
        )
    );
    return;
}
osc_register_plugin(osc_plugin_path(__FILE__), 'socialShareInstall');

function socialShareUninstall()
{
    osc_delete_preference('social_share_active_links');
    return;
}
osc_add_hook(osc_plugin_path(__FILE__) . "_uninstall", 'socialShareUninstall');



