<?php
class AjaxAction extends Action 
{
	public function index()
	{
		$return = array('year' => '2011', 'arr' => array('first' => '1st', 'second' => '2nd'),'shuzu' => ['aaa','bbb','ccc']);
    	$this->ajaxReturn($return);
	}
}
