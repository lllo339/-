
<?php
$con = mysqli_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($con,"zmk_db");
//看有几条id
$sql1="SELECT id FROM goods";

//文件写入可以用函数代替
$zmk=fopen("zmk.sql", "a") ;
fwrite($zmk,$sql1);
fclose($zmk);


$result = mysqli_query($con,$sql1);
$i=0;
while($row = mysqli_fetch_array($result)){
$i=$i+1;
}

//插入
$sql="INSERT INTO goods (id,Time, Place, Class)
VALUES
('$i','$_POST[Time]','$_POST[Place]','$_POST[Class]')";
//echo $sql;

//文件写入
$zmk=fopen("zmk.sql", "a") ;
fwrite($zmk,$sql);
fclose($zmk);

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }else{
	echo "<h1>遗失物上传到数据库成功<h1>";
	echo "3秒后跳转到主页面......";
	$url = "http://127.0.0.1:8080/test/"; 
	echo "<meta http-equiv='refresh' content ='3;url=$url'>";
  }

mysqli_close($con)
?>