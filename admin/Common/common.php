<?php
function P($arr)
{
	dump($arr,1,'<pre>',0);
}

function queryDept($id)
{
	$User = M("department"); 

	//select `name` from fb_department where id=(select `department` from fb_member where id=5)
	$name = $User->where('id=(select `department` from fb_member where id='.$id.')')->getField('name'); 
	//P('p'.$name);
	return $name;
}
?>