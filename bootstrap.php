<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description: 入口文件
 */

define('ROOT_PATH', dirname(__FILE__));
define('SYSTEM_PATH', ROOT_PATH . '/system');
define('EXTEND_PATH', ROOT_PATH . '/extend');
define('VENDOR_PATH', ROOT_PATH . '/vendor');
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');

if (APP_DEBUG) {
    ini_set("display_errors", "On");
    error_reporting(E_ALL | E_STRICT);
} else {
    ini_set('display_errors', 'Off');
}

// Include composer auto loader
include_once VENDOR_PATH . '/autoload.php';

// Register namespace
$loader = new Keradus\Psr4Autoloader();
$loader->register();
$loader->addNamespace('system', SYSTEM_PATH);
$loader->addNamespace('vendor', VENDOR_PATH);
$loader->addNamespace('app', APP_PATH);

// Router
$router = new system\core\Router();

// Logger
$logger = new system\core\Logger();

// Config
$config = new system\core\Config();

$app = system\core\Application::getInstance();
$app->setConfig($config);
$app->setLoader($loader);
$app->setRouter($router);
$app->setLogger($logger);


return $app;