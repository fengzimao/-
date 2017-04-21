<?php
/*
****************************************************

	url:	user.php?act=xxx&user=用户名&pass=密码
					 act=add——注册用户
						 login——登陆
		
	return:	{err: 0/1, msg: 文字描述信息}
			 err:
				  0	 成功
				  1	 失败——具体原因参考msg

****************************************************
*/

//创建数据库之类的
$db=mysql_connect('localhost', 'root', '');
mysql_query("set names 'utf8'");
mysql_query('CREATE DATABASE bk_ajax');
mysql_select_db('bk_ajax');

$sql= <<< END
CREATE TABLE  `bk_ajax`.`user` (
`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`username` VARCHAR( 255 ) NOT NULL ,
`password` VARCHAR( 255 ) NOT NULL
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci
END;

mysql_query($sql);

//正式开始

header('Content-type:bk/json');

$act=$_GET['act'];
$user=strtolower($_GET['user']);
$pass=$_GET['pass'];

switch($act){
	case 'add':
		$sql="SELECT COUNT(*) FROM user WHERE username='{$user}'";
		
		$res=mysql_query($sql);
		
		$row=mysql_fetch_array($res);
		
		if((int)$row[0]>0){
			echo '{err: 1, msg: "此用户名已被占用"}';
			exit();
		}
		
		$sql="INSERT INTO user (ID,username,password) VALUES(0,'{$user}','{$pass}')";
		mysql_query($sql);
		
		echo '{err: 0, msg: "注册成功"}';
		break;
	case 'login':
		$sql="SELECT COUNT(*) FROM user WHERE username='{$user}' AND password='{$pass}'";
		$res=mysql_query($sql);
		
		$row=mysql_fetch_array($res);
		
		if((int)$row[0]>0){
			echo '{err: 0, msg: "登陆成功"}';
			exit();
		}else{
			echo '{err: 1, msg: "用户名或密码有误"}';
			exit();
		}
		break;
}
?>