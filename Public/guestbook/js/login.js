//The Document for login.php
//关闭登陆框 
function close_log() {
	$("#login_bo").hide();
}

function show_log() {
	$("#login_bo").show();
}

//判断用户登录输入信息
 function check_login(form){
	  if(form.username.value == ""){
		alert("用户名不能为空！");
		form.username.select();
		return false;  
	  }
	  
	  if(form.pass.value == ""){
		alert("密码不能为空！");
		form.pass.select();
		return false; 
	  }
	  
	  return true;   
   }