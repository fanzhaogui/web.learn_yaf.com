<?php  

class IndexController extends BaseController
{  

  
    // 默认Action  
    public function indexAction() 
    {  
    	// var_dump($_ENV);
        
    	/*关闭自动加载模板 -- 视图不生效*/
        // $this->getView()->assign("content", "Hello World"); 
    	
    	/*关闭自动加载模板 -- 主动加载视图*/
    	$this->display('index', [
    		'content' => 'Hello World'
    	]);
    }  

    /**
     * 接收ajax请求
     * @return   string     json
     */
    public function ajaxAction()
    {
    	// var_dump($this->getRequest()->isXmlHttpRequest());
    	
    	// if($this->getRequest()->isXmlHttpRequest()) {
    		$data = [
    			'status' => '0000', 
    			'msg' => 'success', 
    			'data' => 123, 
    		];

    		echo json_encode($data);
    	// }
    }









}  


