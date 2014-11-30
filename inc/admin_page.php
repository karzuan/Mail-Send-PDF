<?php
#*************-in this piece of code I use powerful API for costumizatoins-*************#
//**** menu creating
add_action('admin_menu', 'msp_create_menu');
function msp_create_menu(){

//**** new menu	
add_menu_page ( 'Mail Send PDF plugin options', 'MailSendPDF ', 'manage_options', 'msp_main_menu',
					'msp_settings_page' );

}


//**** settings page creation


function msp_settings_page() {

//**** remove array plugin's customisations

$msp_options_arr = get_option ('msp_options');
$ad_name = (! empty($msp_options_arr['option_name'])) ? $msp_options_arr['option_name'] : '';
$ad_mail = (! empty($msp_options_arr['option_email'])) ? $msp_options_arr['option_email'] : '';
$ad_message = (! empty($msp_options_arr['option_mess'])) ? $msp_options_arr['option_mess'] : '';
$ad_url = (! empty($msp_options_arr['option_url'])) ? $msp_options_arr['option_url'] : '';

?>

<div class="wrap">
    <h3>Just another hightly professional WordPress plugin.</h3>
<table>
    <thead>    
        <tr>
            <td>parameter</td>
            <td>data</td>
           
        </tr>
    </thead>
        <tbody>
        <tr>
            <td>WordPress version</td>
        <td><?php
global $wp_version;
echo $wp_version;
?></td>

        </tr>
        <tr>
            <td>shortcode</td>
            <td>[msp_contact_form]</td>
          
        </tr>
    	</tbody>
</table>

<form method = "POST" action="options.php" >
   
<?php
settings_fields('msp-settings-group');
?>
<?php 
$msp_options = get_option('msp_options');
?>

 <table class='form-table'>
 		<tr valign="top">
 			<th scope= "row">Name</th>
 			<td><input type="text" name="msp_options[option_name]" 
 				 value="<?php echo esc_attr( $ad_name ); ?>" />
 			</td>
 		</tr>
 		<tr valign="top">
 			<th scope= "row">Email</th>
 			<td><input type="text" name="msp_options[option_email]" 
 				 value="<?php echo esc_attr( $ad_mail ); ?>" />
 			</td>
 		</tr>
		<tr valign="top">
 			<th scope= "row">URL<br>(path to your book in mediateka, starting '/uploads...)</th>
 			<td><input type="text" name="msp_options[option_url]" 
 				 value="<?php echo esc_url( $ad_url ); ?>" />
 			</td>
 		</tr>
		<tr valign="top">
 			<th scope= "row">covering letter</th>
 			<td><input type="text" name="msp_options[option_mess]" 
 			value="<?php echo esc_attr( $ad_message ); ?>" />
 			</td>
 		</tr>
 	</table>

 	<p class="submit">
 		<input type="submit" class="button-primary"
 			value="save changes" />
 	</p>
 </form>
</div>
<?php
}


//**** function for customisations registration
add_action('admin_init', 'msp_admin_settings_page');

//**** settings
function msp_admin_settings_page (){               // THIS FUNCTION was BUG because i confused wp function name
register_setting ('msp-settings-group','msp_options', 'msp_sanitize_options' );
};

//**** cover data
function msp_sanitize_options($input){
$input['option_name'] = sanitize_text_field( $input['option_name']);
$input['option_email'] = sanitize_email( $input['option_email']);
$input['option_url'] = esc_url_raw( $input['option_url']);
$input['option_mess'] = sanitize_text_field( $input['option_mess']);

return $input;

}



?>