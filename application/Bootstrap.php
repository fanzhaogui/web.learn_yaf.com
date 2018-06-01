<?php 
/**
 * 所有在Bootstrap类中， 已 _init 开头的方法， 都会被Yaf调用，
 * 这些方法，都接受一个参数：Yaf_Dispatcher $dispatcher
 * 调用的次序， 和申明的次序相同
 */

class Bootstrap extends Yaf_Bootstrap_Abstract
{
	public function _initConfig()
	{
		// 关闭自动加载模板
		Yaf_Dispatcher::getInstance()->autoRender(false);
	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher)
	{	
		$user = new UserPlugin();
		$dispatcher->registerPlugin($user);
	}
}
