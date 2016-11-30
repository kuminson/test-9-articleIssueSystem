<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/php/connect/connect.php");
	// print_r($_POST);
	$title = $_POST['title'];
	$author = $_POST['author'];
	$intro = $_POST['intro'];
	$content = $_POST['content'];
	$dateline = time();
	// $insertsql = 'INSERT INTO text(title,author,intro,content,dateline) VALUES("'.$title.'","'.$author.'","'.$intro.'","'.$content.'",'.$dateline.');';
	$insertsql = "INSERT INTO text(title,author,intro,content,dateline) VALUES('$title','$author','$intro','$content',$dateline);";
	// print_r($insertsql);
	if(mysqli_query($con,$insertsql)){
		echo "<script>alert('文章发布成功'); window.location.href = '/html/issuearticle.html'</script>";
	}else{
		echo mysqli_error($con);
		echo "<script>alert('文章发布失败'); window.location.href = '/html/issuearticle.html'</script>";
	}
?>