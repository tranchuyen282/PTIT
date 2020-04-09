
<meta charset=utf-8>
<style>
div{ border:solid 2px red;
		padding: 5px;
		border-radius:5px;
		box-shadow: 2px 2px 5px gray;
		background-color:yellow;
		width: 400px;
		margin:100px 200px;
		font:normal 14pt Arial;
	}
</style>
<?php
session_start();
include("../inc/connect.inc");
$code=$_SESSION['masv'];
$info=$_SESSION['hoten'];

$hp=$_POST['hp'];


$ip=$_SERVER["REMOTE_ADDR"];
$time=date("d/m/Y H:i:s");
$semester="215";

$i=1;
foreach($hp as $value){
//do nhúng tay vào value input bên trang đăng ký, nên giờ phải tách
$value=explode(',',$value)[0];
///
	$malhp=$value.$semester;
	$sql="Insert into dk values('{$code}','{$malhp}','{$ip}','{$time}')";
	mysqli_query($con,$sql);
	$i++;
}
echo "<div> 
	<img src='pic/male.gif' />
	{$info}, <span style='color:red;'>bạn đã đăng ký {$i} học phần</span>
	<p><span style='float:right'>
	<a href=thoikhoabieu.php>Xem thời khóa biểu </a> &nbsp;| &nbsp;
	<a href=work.php>Quay về </a></span>
	</p>
	<br>
	</div>";

mysqli_close($con);
?>