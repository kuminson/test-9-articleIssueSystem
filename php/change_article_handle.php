<?php
	// 引入通用数据库连接
	require_once($_SERVER['DOCUMENT_ROOT']."/php/connect/connect.php");
	// 判定是初始化还是修改内容
	if(array_key_exists('action',$_POST) == false){
		// 缓存数据
		$id = $_POST['id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$intro = $_POST['intro'];
		$content = $_POST['content'];
		// 请求服务器改值
		$querychange = "UPDATE text SET title = '$title', author = '$author', intro = '$intro', content = '$content' WHERE id = $id;";
		if(mysqli_query($con,$querychange)){
			echo "<script>alert('文章修改成功！'); window.location.href = '/html/changearticle.html';</script>";
		}else{
			echo "<script>alert('文章修改失败！'); window.location.href = '/html/changearticle.html';</script>";
			echo "<br/>";
			echo $querychange;
		}
	}elseif($_POST['action'] == 'init'){
		// 获取id值
		$infoid = $_POST['id'];
		// 请求数据库值
		$queryinfo = "SELECT * FROM text WHERE id = $infoid;";
		$info = mysqli_query($con,$queryinfo);
		// 获取值
		$text = mysqli_fetch_assoc($info);
		// 值转换成json
		// 打印值
		echo json_encode($text);
	}
?>