function ajax(url,fnSuccess,fnError){
	if(window.XMLHttpRequest){
		var xhr=new XMLHttpRequest();
	}else{
	var xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.open("get",url,true);
	xhr.send();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			if(xhr.status==200){
				fnSuccess(xhr.responseText);
			}else{
				fnError(xhr.status);
			}
		}
	}
}