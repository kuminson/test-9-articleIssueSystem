$(function(){
	// 加载html 头部模块
	intenload({
		target:"body",
		place:"prepend",
		placeto:"prependTo",
		url:"/html/module.html",
		doc:"#header"
	});
	// 加载html 菜单模块
	intenload({
		target:"#main",
		place:"prepend",
		placeto:"prependTo",
		url:"/html/module.html",
		doc:"#m_nav"
	});
	// 加载html 脚步模块
	intenload({
		target:"#main",
		place:"after",
		placeto:"insertAfter",
		url:"/html/module.html",
		doc:"#footer"
	});

	// 绑定页面跳转
	$("body").on("click","#mnt_issue",function(){
		window.location.href = "/html/issuearticle.html";
	});
	$("body").on("click","#mnt_control",function(){
		window.location.href = "/html/controlarticle.html";
	});
});

// 加载
function intenload(obj){
	var nowtime = new Date;
	var stamp = nowtime.getTime();
	$(obj.target)[obj.place]("<div id='"+stamp+"'></div>");
	$("#"+stamp).load(obj.url+" "+obj.doc,function(){
		$(obj.doc)[obj.placeto](obj.target);
		$("#"+stamp).remove();
	});
}