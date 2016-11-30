<?php
// 链接服务器
require_once($_SERVER['DOCUMENT_ROOT']."/php/connect/connect.php");
// 判定接收操作
if(array_key_exists('action',$_REQUEST) && $_REQUEST['action'] == 'all'){
	// 请求服务器
	$queryall = 'SELECT id,title FROM text ORDER BY id;';
	// 判定数据库请求是否成功
	if($queryinfo = mysqli_query($con,$queryall)){
		// 收集数据
		$callback = array();
		while($info = mysqli_fetch_assoc($queryinfo)){
			$callback[] = $info;
		}
		$fontend = ['success'=>'success','data'=>$callback];
		// 打印 json格式数据
		echo json_encode($fontend);
	}else{
		// 请求数据库失败 返回失败信息
		echo json_encode(['error'=>'数据库请求失败','data'=>mysqli_error($con)]);
	}
}else{
	echo json_encode(['error'=>'传入后端操作识别码有误']);
}
?>