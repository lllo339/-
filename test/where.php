<?php
//丢失者lost people
$con = mysqli_connect("localhost","root","123456","zmk_db");
if (!$con)
  {
  die('数据库链接失败' . mysqli_error());
  }
else{
mysqli_select_db($con,"zmk_db");
$sql="SELECT * FROM goods where Class='$_POST[Class]'";

//文件写入
$zmk=fopen("zmk.sql", "a") ;
fwrite($zmk,$sql);
fclose($zmk);
//写入文件完毕

$result = mysqli_query($con,$sql);
//var_dump($result);
if($row = mysqli_fetch_array($result))
  {	//全部输出$row数组
	echo "<table border="."1"."> ";
	echo "<tr><th>物品编号</th><th>发现时间</th><th>发现地点</th></tr>";
	echo "<tr><th>".$row['id'] . "</th><th> " . $row['Time']."</th><th> " . $row['Place']."</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><th>".$row['id'] . "</th><th> " . $row['Time']."</th><th> " . $row['Place']."</th></tr>";
		}
	echo "</table>";
  }else{
	  echo '输入有误或者没有该物品'.mysqli_error($con);
  }

mysqli_close($con);
	
}
?>