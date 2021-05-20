<?php
//数据库名称:root 密码:123456 数据库用zmk_db
$con = mysqli_connect("localhost","root","123456","zmk_db");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

//echo "在goods_db创建goods表";
 mysqli_select_db($con,"zmk_db");
 $sql = "CREATE TABLE goods(
id int(4) primary key,
Time varchar(15),
Place varchar(15),
Class varchar(15) not null
 )";
//文件写入
$zmk=fopen("zmk.sql", "a") ;
fwrite($zmk,$sql);
fclose($zmk);
//写入文件完毕
 @mysqli_query($con,$sql);
 // 测试用
// echo $sql;
//if(!mysqli_query($con,$sql))
//	{	die('Error: ' . mysqli_error($con));
//}else{
//	echo 'yes';
//};



?>