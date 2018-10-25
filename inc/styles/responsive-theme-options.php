<?php

/*********************************************
 * 
 * Output Reponsive Options from 
 * theme options
 * 
 * @since 1.5.0
 * 
 *******************************************/
 
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
 
 header("Content-type: text/css; charset: UTF-8");
 header('Cache-control: must-revalidate');
 
 $lucent_global = lucent_global();
 
 /***************************************************
  * 
  * Boxed layout theme options
  * 
  **************************************************/
  
 ?>
 
