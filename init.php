<?php

//设置字符集
header('content-type:text/html;charset=utf-8');
//调试开关
define('APP_DEBUG', true);
//开启调试时，显示错误报告
ini_set('display_errors', APP_DEBUG);
//定义前后台公共目录常量
define('COMMON_PATH','./common/');   //公共文件目录
define('UPLOAD_PATH', './upload/');  //上传文件目录
//载入数据库函数
require COMMON_PATH.'db.php';
// 载入dao库
require COMMON_PATH.'function.php';
// 载入dao库
require COMMON_PATH.'module.php';

//启动session
session_start();
//为项目创建Session，统一保存到cms中
if(!isset($_SESSION['dyblog'])){
	$_SESSION = ['dyblog' => []];
}
