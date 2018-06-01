<?php 

/**
 * @name ErrorController
 * @desc 错误控制器, 在发生未捕获的异常时刻被调用
 * @see http://www.php.net/manual/en/yaf-dispatcher.catchexception.php
 * @author root
 */
class ErrorController extends BaseController
{
	/** 
      * you can also call to Yaf_Request_Abstract::getException to get the 
      * un-caught exception.
      * 从2.1开始, errorAction支持直接通过参数获取异常
      */
	public function errorAction($exception) 
	{
		/* error occurs */
        // switch ($exception->getCode()) {
        //     case YAF_ERR_NOTFOUND_MODULE:
        //     case YAF_ERR_NOTFOUND_CONTROLLER:
        //     case YAF_ERR_NOTFOUND_ACTION:
        //     case YAF_ERR_NOTFOUND_VIEW:
        //         echo 404, ":", $exception->getMessage();
        //         break;
        //     default :
        //         $message = $exception->getMessage();
        //         echo 0, ":", $exception->getMessage();
        //         break;


        // }
        // 重新设置视图目录， 防止多模块的时候把view目录指向到了模块的view目录
	    $this->setViewPath(APP_PATH.'/application/views');
	    
	    $this->display('error', [
	    	'exception' => $exception
	    ]);
	}
}