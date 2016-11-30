$(function(){
	// 加载表格列表
	addtable();
	// 绑定删除操作
	$("body").on("click",".del",function(){
		// 获取id值
		var artid = parseInt($(this).closest("td").siblings(".id").html());
		// 删除数据库数据
		deletetable(artid);
	});
	// 绑定修改操作
	$("body").on("click",".change",function(){
		var artid = parseInt($(this).closest("td").siblings(".id").html());
		window.location.href = "/html/changearticle.html?id="+ artid;
	});
});

// 清除表格
function cleartable(){
	$("#mt_tbody").children("tr").has("td").remove();
}

// 加载文章列表
function addarticlefortable(data){
	for(var i=0; i<data.length; i++){
		$("#mt_tbody").append('<tr>'
								+'<td class="id">' + data[i].id + '</td>'
								+'<td>' + data[i].title + '</td>'
								+'<td>'
									+'<a href="#" class="del">删除</a> '
									+'<a href="#" class="change">修改</a>'
								+'</td>'
							+'</tr>');
	}
}

// 加载表格列表
function addtable(){
	// 获取文章列表
	$.ajax({
		url: "/php/all_article_handle.php",
		type: "POST",
		dataType: "json",
		data: {action: "all"},
		success:function(data){
			if(data.success != undefined){
				// 清除表格
				cleartable();
				// 加载表格
				addarticlefortable(data.data);
			}else{
				console.log(data);
			}
		},
		error:function(data){
			alert("链接服务器失败");
			// console.log(data);
		}
	});
}

// 删除数据库数据
function deletetable(artid){
	$.ajax({
			url: "/php/delete_article_handle.php",
			type: "POST",
			dataType: "json",
			data: {action: "delete",id:artid},
			success:function(data){
				if(data.success != undefined){
					// 重新加载表格数据
					addtable();
				}else{
					console.log(data);
				}
			},
			error:function(){
				alert("链接服务器失败");
			}
		});
}