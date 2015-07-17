//The Document for index.php
function checkInput(form){	 
	 //验证标题是否为空
	 if(form.title.value == ''){
		 alert('标题不能为空！');
		 form.title.focus();
		 return false;
	 } 	
	 
	 //验证输入内容是否为空
	 if(form.content.value == ''){
		 alert('沉默有时不一定就会得到金子！');
		 form.content.focus();
		 return false;
	 }
	
	return true;
}

//显示留言板
function message_show() {
	$("body").css('background','#999');
	$("#wrap").show();
}