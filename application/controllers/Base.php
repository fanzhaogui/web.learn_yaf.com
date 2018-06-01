<?php

/**
 * 定义为抽象的类不能被实例化
 *  
 */
abstract class BaseController extends Yaf_Controller_Abstract 
{
	// 抽象类不能访问  /index/index
	public function testAction()
	{
		echo "this is abstract action！";
	}
}