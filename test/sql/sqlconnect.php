<?php
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

echo 'hello';
//创建数据库是否存在,存在既不新建
$sql = "CREATE DATABASE zmk_db";
//文件写入
$zmk=fopen("zmk.sql", "a") ;
fwrite($zmk,$sql);
fclose($zmk);
//写入文件完毕
 mysqli_query($con,$sql);
//以下内容测试的时候用的.
//if ($con->query($sql) === TRUE) {
//echo "数据库创建成功";
// 创建zmk_db
//} else {
//echo "创建错误: " . $con->error;

//}

mysqli_close($con);


?>
