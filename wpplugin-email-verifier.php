<?php
/**
 * Plugin Name:NEW WordPress Email Virifier
 * Plugin URI: https://prebor.space/wpplugin_email_verifier
 * Description: verifier for domains
 * Version: 0.1
 * Author: Kamen Petkov
 * Author URI: https://dulodesign.eu/
 */
/**
 * Copyright (c) `date "+%Y"` . All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */
// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

    //create new top-level menu
    add_menu_page('My Cool Plugin Settings', 'Cool Settings', 'administrator', __FILE__, 'my_cool_plugin_settings_page', plugins_url('/images/icon.png', __FILE__));

    //call register settings function
    add_action('admin_init', 'register_my_cool_plugin_settings');
}

function register_my_cool_plugin_settings() {
    //register our settings

    register_setting('my-cool-plugin-settings-group', 'new_option_name');
//    register_setting('my-cool-plugin-settings-group', 'some_other_option');
//    register_setting('my-cool-plugin-settings-group', 'option_etc');
}

function my_cool_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>email-restricted</h1>

        <form method="post" action="options.php">
            <?php settings_fields('my-cool-plugin-settings-group'); ?>
    <?php do_settings_sections('my-cool-plugin-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">New Option Name</th>
                    <td><input type="text" name="new_option_name" value="" /></td>
                </tr>
            </table>
    <?php submit_button(); ?>
        </form>
    </div>
    <div><label><h2>Домейни непопадащи под рестрикця</h2></label></br>
        <td><?php echo esc_attr(get_option('new_option_name')); ?></td>
    </div>
    <?php
}

//add_action('registration_errors', 'validate_email_domain', 10, 3);
//
//function validate_email_domain($errors, $login, $email) {
//    if (is_email($email) and substr($email, -3) != 'new_option_name') {
//        $errors->add('email_domain', __('ERROR: You may only register with a withespace email address.'));
//    }
//    return $errors;
//}

//Пробваме с този далеч по чист вид?
