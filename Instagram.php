<?php

require_once('vendors/httpful/bootstrap.php')

/**
* Class: Instagram Feed Class
* Author: Bruno Germano <bruno@egermano.com>
*/
class Instagram
{
    /**
     * Binds events of wordpress
     * @return void
     */
    public static function binds()
    {

        add_action('admin_menu', array(Instagram, 'menu'));
        add_action( 'admin_init', array(Instagram, 'register_settings'));

    }

    /**
     * build a menu in settings group
     * @return void
     */
    public static function menu(){
        add_options_page('Instagram', 'Instagram', 'manage_options', 'instagram', array(Instagram, 'settings_page'));
    }

    /**
     * Register Settings of Plugin
     * @return [type] [description]
     */
    public static function register_settings(){
        register_setting( 'egermano-instagram', 'instagram-clientid' );
        register_setting( 'egermano-instagram', 'instagram-secret' );
        register_setting( 'egermano-instagram', 'instagram-access-token' );
    }

    /**
     * Build a Setting Page in Administration area
     * @return void
     */
    public static function settings_page(){
        screen_icon();
        echo '<h2>Instagram</h2>';
        echo '<form method="post" action="options.php"> ';
        settings_fields( 'egermano-instagram' );
        do_settings_fields( 'egermano-instagram' );

        $token_url = '#nope';

        if (get_option('instagram-clientid') && get_option('instagram-secret')) {
            $token_url = 'https://api.instagram.com/oauth/authorize/'.
                        '?client_id='.get_option('instagram-clientid').
                        '&redirect_uri=http://dev.wp.com/wp-admin/options-general.php?page=instagram'.
                        '&response_type=token';
        }

        $access_token = '';

        if (!($access_token = get_option('instagram-access-token'))) {
            $access_token = $_GET['access_token'];
        }

        echo '<table class="form-table">
                <tr valign="top">
                <th scope="row">Client ID</th>
                <td><input type="text" name="instagram-clientid" value="'. get_option('instagram-clientid') .'" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Client Secret</th>
                <td><input type="text" name="instagram-secret" value="'. get_option('instagram-secret') .'" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Access Token</th>
                <td><input type="text" name="instagram-access-token" id="instagram-access-token" value="'. $access_token .'" /> &nbsp; <a href="'.$token_url.'">Get Access Token</a></td>
                </tr>
                <script>
                    if(document.getElementById("instagram-access-token").value === "")
                        document.getElementById("instagram-access-token").value = window.location.hash.replace("#access_token=","");
                </script>
            </table>';

        submit_button();
    }

    /**
     * Request a recent posts on Instagram API
     * @param  string  $userid ID of user on Instagram
     * @param  integer $limit  total medias required
     * @return array          colection of medias
     */
    public static function get_feed($userid, $limit=16) {
        // settings_fields( 'egermano-instagram' );
        $access_token = '';
        if (!($access_token = get_option('instagram-access-token'))) {
            return false;
        }

        $url = 'https://api.instagram.com/v1/users/'.$userid.'/media/recent/?access_token='.$access_token.'&count='.$limit;

        $response = \Httpful\Request::get($url)->send();

        return $response->body->data;
    }
}

// Egermano!!!

Instagram::binds();
