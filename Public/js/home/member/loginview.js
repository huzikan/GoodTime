$(function(){
	var value = 0,step = 2;
	var progressBar = $(".progress .progress-bar");
	var max_value = progressBar.attr('aria-valuemax');

	setTimeout(run, 100);

	function run(){
		var now_value = progressBar.attr('aria-valuenow');
		if (parseInt(now_value) < parseInt(max_value)) {
			value = parseInt(value) + step;
			progressBar.css('width', value + '%');
			progressBar.attr('aria-valuenow', parseInt(now_value) + step);
			$(".bar-notice").text((parseInt(now_value) + step) + '%');
			setTimeout(run, 100);
		}
	}

	var submitBtn = $(".login-botton");
	var img = $(".verify_code img");
	submitBtn.bind('click', function(e){
		$.ajax({ 
			url   : '/home/member/login', 
			data  : $('#login').serialize(), 
			type  : "post",
			cache : false,
			success: function(res) {
				if (res.success == false) {
					//回显错误到页面
					$(".error-tips").text(res.data);
					//刷新验证码
					img.attr('src', '/home/member/getValidCode?' + Math.random());
				} else {
					window.location.href = '/home/Index/Index';
				}
			}
		});
	});

	img.bind('click', function(){
		$(this).attr('src', '/home/member/getValidCode?' + Math.random());
	});
})