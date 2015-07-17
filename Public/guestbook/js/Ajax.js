//分页ajax
function setAjaxPage(url,con,tpage,tid) {
   $.post(url,{pageName:tpage,conName:con,userid:tid},function(data) {
	   $(con).html(data);
   });
}

//函数ajax
function setAjaxFunc(con,tid) {
    var tpage = $("#the_pa_ge").text();
    $.post("include/ajax/echoAjaxFunc.php",{name:con,id:tid});
    setAjaxPage('include/ajax/echoAjaxPage.php?page='+tpage,'#ajax_con','show','not');
}

//空间ajax
function setUserAjaxFunc(con,tid,userd) {
       if(userd == 'UshowD') {
    	   $.post("include/ajax/echoAjaxFunc.php",{name:con,id:tid},function(data){
    		   $(".show").html(data);
    	   });
       }
}