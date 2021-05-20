<html>
<img style="  position: absolute; top: 8px;  right: 16px;font-size: 18px;" src="../test/img/logo2.png">
<head>
<style>
body {
  background: #ffffff url("../test/img/logo.png") no-repeat left top;
  margin-top: 120px;
}
</style
</head>
<body>
<h1 style="  height: 70px;width:450px;background-color: powderblue;"> 欢迎来到xcxy失物招领中心<h1>
<br>
<form action="lfp.html" method="post">
我捡到了东西<br>
<input type="submit" />
</form>
<br>
<form action="lp.html" method="post">
我丢失了东西<br>
<input type="submit" />
</form>
<?php
include  '../test/sql/sqlconnect.php';
include '../test/sql/table.php';
$con = mysqli_connect("localhost","root","123456","zmk_db");
if (!$con)
  {
  die('数据库链接失败' . mysqli_error());
  }else{
	mysqli_select_db( $con,"zmk_db",);
		$sql="SELECT * FROM goods";
		$result = mysqli_query($con,$sql);
//文件写入
		$zmk=fopen("zmk.sql", "a") ;
		fwrite($zmk,$sql);
		fclose($zmk);
//写入文件完毕
		$row = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result))	{
		echo "<div style="."background-color:MediumSeaGreen;" .">". $row['Time'] . " " . $row['Class'] . "</div>";
		echo "<br />";	
		} 
 
	}
?>

</body>
</html>