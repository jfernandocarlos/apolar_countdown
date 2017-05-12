<?php

/*
Plugin Name: Apolar Countdown
Description: Disponibiliza uma shortcode para exibição de uma contagem regressiva para determinados imóveis. Exclusivo Site Apolar.
Version: 0.1
License: GPL
Author: José Fernando Carlos
Author URI: http://apolar.com.br
*/
if(!defined('DS')){
	define('DS', DIRECTORY_SEPARATOR);
}
require_once(dirname(__FILE__) . DS . "settings.php");
require_once(dirname(__FILE__) . DS . "countdown.php");
require_once(dirname(__FILE__) . DS . "admin.php");