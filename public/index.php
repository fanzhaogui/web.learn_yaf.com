<?php  

	// echo __FILE__; // 文件所在目录，包含文件名 D:\wamp64\www\web.7yaf.com\public\index.php
	// echo dirname(__FILE__); // 文件夹路径 D:\wamp64\www\web.7yaf.com\public
	// echo realpath(dirname(__FILE__) . '/../'); // D:\wamp64\www\web.7yaf.com
	// die;
	define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */  
	$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");  
	

	// $app->run();  
  	$app->bootstrap()->run();


