$(function(){
	//标签背景颜色池
	var colorPool = ['#036564', '#8A9B0F', '#EB6841', '#3FB8AF', '#FE4365',
					 '#FC9D9A', '#EDC951', '#C8C8A9', '#83AF9B'];
	//为云标签动态随机渲染颜色
	$(".laber-container>ul>li").each(function(i) {  
		var colorIndex = Math.ceil(Math.random() * 100000) % 9;
		$(this).css("background-color", colorPool[colorIndex]);
	});

	$(".top-container .top-tab li").mouseenter(function(e) {
		if (!$(this).hasClass("cur")) {
		    //获取当前元素索引
			var index = $(this).index();
		    $(this).siblings(".cur").removeClass("cur");
			$(".top-container>div").removeClass("content-show");
			$(".top-container>div").eq(index).addClass("content-show");
		    $(this).addClass("cur");
		}
	});
});