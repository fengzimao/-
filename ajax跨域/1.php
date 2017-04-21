<?php
	header("Content-type: text/html; charset=utf-8");
	if(isset($_POST['submit'])){
	  echo "用户名:";
	  echo $_POST['userName'];
	  echo "<br/>";
	  echo "密码:";
	  echo $_POST['passWord'];
}
?>