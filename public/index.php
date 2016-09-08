<?php
/**
 * Author: ddinnnng@qq.com
 * Date: 2016/9/8
 * Description:
 */

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

define('APP_DEBUG', true);

// include bootstrap file
$app = require __DIR__ . '/../bootstrap.php';
$app->run();
