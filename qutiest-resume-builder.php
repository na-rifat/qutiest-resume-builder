<?php 
/**
 * Plugin name: Qutiest Resume Builder
 * Plugin URI: https://qutiest.com
 * Author: Qutiest
 * Author URI: https://qutiest.com
 * Description: Resume Builder Plugin
 * Text Domain: qrb
 */

define('QRB_PATH', __DIR__);
define('QRB_URL', plugins_url('', __FILE__));

 require_once 'vendor/autoload.php';

 qrb\Init::start();
 