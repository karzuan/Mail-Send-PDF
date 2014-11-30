<?php
/****************************
******script-control*********
****************************/
function msp_load_script(){
	wp_enqueue_style('bk_style', plugin_dir_url(__FILE__) . 'css/bk_style.css'  );
}

add_action( 'wp_enqueue_scripts', 'msp_load_script' );  

?>