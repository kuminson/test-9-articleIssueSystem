$(function(){
	// 获取id
	var regex = /\?.*id=(\d*)/g;
	var urlid = regex.exec(window.location.href);
	if(urlid != null){
		var intid = parseInt(urlid[1]);
		// 异步获取后端的值
		formadddatafrombase(intid);
	}
	
});

// 表单数据加载
function formadddata(data){
	$("#id").val(data.id);
	$("#title").val(data.title);
	$("#author").val(data.author);
	$("#intro").val(data.intro);
	$("#content").val(data.content);
}

// 获取表单数据
function formgetdata(){
	var data = {};
	data.id = $("#id").val();
	data.title = $("#title").val();
	data.author = $("#author").val();
	data.intro = $("#intro").val();
	data.content = $("#content").val();
	return data;
}

// 加载表单数据
function formadddatafrombase(intid){
	$.ajax({
		url: "/php/change_article_handle.php",
		type: "POST",
		dataType: "json",
		data: {action: "init",id:intid},
		success:function(data){
			// 初始化表单数据
			formadddata(data);
		},
		error:function(data){
			alert("连接服务器失败");
		}
	});
}