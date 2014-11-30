<?php
//if the submit button is clicked - send the mail
function deliver_mail() {
if ( isset ( $_POST['cf-submitted'])) {
//**** array options. wp admin options reading
			$msp_arrforsend = get_option ('msp_options');
			$my_me= $msp_arrforsend['option_name'];
			$my_to = $msp_arrforsend['option_email'];
			$my_mess= $msp_arrforsend['option_mess'];
			$my_url = $msp_arrforsend['option_url'];	




//sanitize form values
	$a_name    = sanitize_text_field ( $_POST["cf-name"]);
	$a_email   = sanitize_email ($_POST["cf-email"]);
	$a_subject = "inbox friendly mail with attachment";
	$a_message = "Здравствуйте уважаемый(-ая) $a_name!!!"."\r\n". $my_mess . "\r\n";
	$headers = "From: humandesignrussia.com <info@humandesignrussia.com>" . "\r\n ";
	

//**** delivery report

			$my_subject = "delivery report";
			$my_message = "mr.$my_me" . "\r\n " . "The book've been downloaded. You have a comment:" . esc_textarea ($_POST["cf-message"]) . "\n\nSent by: $a_name ($a_email)";
			$my_headers = "mail book form" . "\r\n ";
			
			wp_mail ($my_to, $my_subject, $my_message, $my_headers ); // tell to myself about downloading
	

     $att_file = array( WP_CONTENT_DIR .  $my_url ); // func finds out location of mediateka and path to book
     
     if(!wp_mail ( $a_email, $a_subject, $a_message, "From: hd", $att_file))
    {
        echo "Упс! Что-то не получилось! "; 
    }
              else
              {
                 echo "Отправлено!";
		 echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"1; url=".$_SERVER['HTTP_REFERER']."\">";
              }
          }
;
             
}

?>