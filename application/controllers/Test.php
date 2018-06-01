<?php 


class TestController extends BaseController
{
	/**
	 * @url /index/test/test 全路径
	 * @url /test/test  简写路径
	 * 
	 * @Author   请上座/Andy
	 * @DateTime 2018-06-01
	 * @return   [type]     [description]
	 */
	public function testAction()
	{
		echo "this is index test test ";
		die;
	}
}