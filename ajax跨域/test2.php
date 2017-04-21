<?php
/*使用txt文件记录数据的简单实现*/
$counter=1;//定义变量
if(file_exists("counter.txt")){//判断文件是否存在
	$fp=fopen("counter.txt","r");//只读方式打开
	$counter=fgets($fp,9);//读取文件$fp的9个字节
	$counter++;//变量递增
	fclose($fp);//关闭文件$fp
}
$fp=fopen("counter.txt","w");//写入方式打开(如没有则创建并打开)
fputs($fp,$counter);//把变量$counter写入文件$fp
fclose($fp);//关闭文件$fp
echo $counter;//输出变量
?>