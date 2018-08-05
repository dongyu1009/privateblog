<?php

	require './init.php';
	
	function timedesall($time=NULL)
	{
		if ($time==NULL)
			return '未知更新时间';
		else {
			$nowtime=date('Y年m月d日',$time);
			return $nowtime;
		}
	}

	$subcatagory = I('subcatagory', 'get', 'id');

	$catagorys = allblogcatagorys();

	$blogs = blogs($subcatagory);

	require "./view/blogs.html";