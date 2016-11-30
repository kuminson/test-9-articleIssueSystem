<?php
	// 引用通用连接数据库
	require_once($_SERVER['DOCUMENT_ROOT']."/PHP/connect/connect.php");
	// 判断删除动作KEY
	if(array_key_exists('action',$_REQUEST) && ($_REQUEST['action'] == 'delete')){
		// 接收数据
		$id = $_REQUEST['id'];
		$requiredel = "DELETE FROM text WHERE id = $id;";
		// echo $requireinfo;
		// 请求数据库 删除数据
		if(mysqli_query($con,$requiredel)){
			echo json_encode(['success'=>'success']);
		}else{
			// 返回错误
			echo json_encode(['error'=>'请求数据库失败','data'=>mysqli_error($con)]);
		}
	}
?>