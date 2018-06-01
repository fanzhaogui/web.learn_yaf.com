<?php

/**
 * 定义为抽象的类不能被实例化
 *  
 */
abstract class BaseController extends Yaf_Controller_Abstract 
{
	
	public function init() 
	{
		/**
		 * 如果是Ajax请求， 则关闭HTML输出
		 */
		if ($this->getRequest()->isXmlHttpRequest()) {
			
			Yaf_Dispatcher::getInstance()->disableView();
		}

		
	}

	// 抽象类不能访问  /index/index
	public function testAction()
	{
		echo "this is abstract action！";
	}
}