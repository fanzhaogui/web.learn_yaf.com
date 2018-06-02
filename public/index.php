<?php  

// echo __FILE__; // 文件所在目录，包含文件名 D:\wamp64\www\web.7yaf.com\public\index.php
// echo dirname(__FILE__); // 文件夹路径 D:\wamp64\www\web.7yaf.com\public
// echo realpath(dirname(__FILE__)); die; D:\wamp64\www\web.7yaf.com\public
// echo realpath(dirname(__FILE__) . '/../'); // D:\wamp64\www\web.7yaf.com

/*define("APP_ROOT",  realpath(dirname(__FILE__) . '/../'));
define('APP_PATH', APP_ROOT . '/application');
define('APP_CONFIG', APP_ROOT . '/conf');

// 实例化Bootstrap，一次调用Bootstrap中所有 _init开头的方法
$app  = new Yaf_Application(APP_CONFIG . "/application.ini");*/

define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));

//$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");

// 第二个参数用来确认不同环境的配置 对应config中的内容
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini", "common");


// error_reporting(0);
//定义全局 library
ini_set("yaf.library", APP_PATH . "/library");

/*var_dump($_ENV);
$e = getenv('PATHEXT');
var_dump($e);*/

// $app->run();
$app->bootstrap() // 可选
    ->run();


