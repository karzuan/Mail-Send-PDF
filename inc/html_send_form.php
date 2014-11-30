<?php
function html_form_code () {
	echo '<form action=" ' . esc_url( $_SERVER['REQUEST_URI']) . '"method = "POST">';
	echo '<p>For getting our delicious book fill in the form</p>';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Zа-яА-Я0-9]+" value="' . 
	( isset ( $_POST["cf-name"]) ? esc_attr( $_POST["cf-name"]) : '') . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type= "email" name="cf-email" value="' . (isset( $_POST["cf-email"]) ? esc_attr( $_POST["cf-email"]): '') . '" size = "40" />';
	echo '</p>';
	echo '<p>';
	echo 'Leave a comment ( not nessasary )<br/>';
	echo '<textarea rows="10" cols="35" name="cf-message">' . (isset ($_POST["cf-message"]) ? esc_attr( $_POST["cf-message"]) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type = "submit" name="cf-submitted" value="Send"></p>';
	echo '</form>';
}
?>