<?php
/*
Plugin Name: Mail Send PDF
Plugin URI: http://karzuan.com/mail-send-pdf-wp-plugin
Description: This is small script, sending mail massage including pdf file.
Version: beta 1.0
Author: karzuan
Author URI: //http://karzuan.com/
License: GPLv2
*/

/*  Copyright 2014 Kuts Konstantin  (email: freelance106@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*********************************************
*******************includes*******************
*********************************************/

include ('inc/scripts.php');// this control js and css
include ('inc/admin_page.php');// this is plagin's admin page
include ('inc/html_send_form.php');// contact form
include ('inc/mail_send.php');// mail deliver checking
include ('inc/api_send.php');// send mail to mailgimp
//$msp_options = get_option('msp_settings');

register_activation_hook ( __FILE__, 'msp_install' ); // activation of plugin
function msp_install ()   {

//**** set up default parametres

$msp_options_arr = array ( 'currency_sign' => '$');

//**** save default parametres

update_option('msp_options', $msp_options_arr);

//**** 






                                    }


/************ deactivation ************/

register_deactivation_hook( __FILE__, 'msp_deactivation()' ); // deactivation of plugin
function msp_deactivation () {
    // some code
    }



/************* local path ***********************

plugin_dir_path( _FILE_ ) //    /public_html/wp-content/plugins/nameof plugin
 
plugin_dir_path ( _FILE_.'js/script.js') //    /public_html/wp-content/plugins/nameof plugin/fs/script.js


******************* end *************************/


/************* URL path ***********************



echo '<img scr=" ' .plugins_url ('images/icon.png', _FILE_ ). ' ">'; //    <img scr="http://example.com/wp-content/plugins/halloween-plugin/images/icon.png">





******************* SHORTCODE *************************/
function msp_shortcode () {  
    ob_start();
    html_form_code();
    deliver_mail();
    return ob_get_clean();

}

add_shortcode ('msp_contact_form', 'msp_shortcode'); 

/***********************************************************************
 ***********************************************************************
 ************************[msp_contact_form]*****************************
 ***********************************************************************
 **********************************************************************/


add_filter('widget_text', 'do_shortcode'); // this line add possibility to use shortcode in widgets



?>