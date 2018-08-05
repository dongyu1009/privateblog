<?php

	require './init.php';

	$catagorys = allblogcatagorys();

	$bid = I('bid', 'get', 'id');


	$blog = NULL;
	if($bid != NULL)
	{
		$blog = blogbyid($bid);
	}

	//有表单提交，处理表单
	if($_POST){	
		if($bid == NULL) {
			$input = [
				'name' => I('name','post','string'),
				'content' => I('content','post','string'),
				'sid' =>  I('sid','post','id')
			];
			$res = db_query('INSERT INTO `b_blog` (`name`, `content`, `sid`) VALUES (?,?,?)', 'ssi', $input);
			redirect('./blog.php?bid='.$res->insert_id);
		}
		else {

			$input = [
				'name' => I('name','post','string'),
				'content' => I('content','post','string'),
				'sid' =>  I('sid','post','id'),
				'bid' =>  $bid
			];
			$res = db_query('UPDATE `b_blog` SET `name` = ?, `content` = ?, `sid` = ? where `bid` = ?', 'ssii', $input);
			redirect('./blog.php?bid='.$bid);
		}
	}

	//没有表单提交，显示页面
	require "./view/newblog.html";
