<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/config/config.php');
	// 连库
	if(!($con = mysqli_connect(HOST,USERNAME,PASSWORD))){
		echo '<br/>';
		echo '连接失败';
		echo mysqli_error();
	}
	// 选库
	if(!(mysqli_select_db($con,'article'))){
		echo '<br/>';
		echo '选择数据库失败';
		echo mysqli_error();
	}
	// 字符集
	if(!(mysqli_query($con,'SET NAMES utf8'))){
		echo '<br/>';
		echo '修改字符集失败';
		echo mysqli_error();
	}
?>