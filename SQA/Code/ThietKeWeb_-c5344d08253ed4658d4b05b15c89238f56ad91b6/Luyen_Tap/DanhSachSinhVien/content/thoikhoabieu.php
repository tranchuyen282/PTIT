<!DOCTYPE html>
<html>
<head>
<title> New document </title>
<meta charset=utf-8>
<style>
	body{margin: 40px 80px; 
		font:normal 14pt Arial; 
		color:navy;}
	a:link,a:visited,a:active{color:green;
		text-decoration:none}
	a:hover{color:red;
		text-decoration:underline}
	table{border-collapse:collapse;
		border:solid 2px green}
	td,input{border:solid 1px grey;
		padding:3px 10px;
		font:normal 14pt Arial;
		text-align:center;}
	tr:hover{background-color:lime;}
	img{float:left;margin-right:20px}
	div{ border:solid 2px red;
		padding: 10px 10px;
		border-radius:5px;
		box-shadow: 2px 2px 5px gray;
		background-color:yellow;
		width: 420px;
		margin:100px 200px
	}


	table.comicGreen {
  font-family: "Comic Sans MS", cursive, sans-serif;
  border: 2px solid #4F7849;
  background-color: #EEEEEE;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.comicGreen td, table.comicGreen th {
  border: 1px solid #4F7849;
  padding: 3px 2px;
}
table.comicGreen tbody td {
  font-size: 19px;
  font-weight: bold;
  color: #4F7849;
}
table.comicGreen tr:nth-child(even) {
  background: #CEE0CC;
}
table.comicGreen tfoot {
  font-size: 21px;
  font-weight: bold;
  color: #FFFFFF;
  background: #4F7849;
  background: -moz-linear-gradient(top, #7b9a76 0%, #60855b 66%, #4F7849 100%);
  background: -webkit-linear-gradient(top, #7b9a76 0%, #60855b 66%, #4F7849 100%);
  background: linear-gradient(to bottom, #7b9a76 0%, #60855b 66%, #4F7849 100%);
  border-top: 1px solid #444444;
}
table.comicGreen tfoot td {
  font-size: 21px;
}
</style>
</head>
<body>
<?php
session_start();
$code=$_SESSION["masv"];
$info=$_SESSION["hoten"];

include("../inc/connect.inc");
include("../inc/library.inc");
if(!isRegistered($code)){
	echo "<div> 
	<img src='pic/male.gif' />
	{$info}, <span style='color:red;'>bạn chưa đăng ký học phần</span>
	<p><span style='float:right'><a href=work.php>Quay về </a></span></p>
	<br>
	</div>";
}
else{
	$sql="Select * from hp inner join tk on hp.mahp=left(tk.malhp,3) 
	      inner join dk on tk.malhp=dk.malhp 
		  where dk.masv='{$code}'";
	$rs=mysqli_query($con,$sql);

	echo "<img src='pic/male.gif' /><h3>THỜI KHÓA BIỂU CÁ NHÂN</H3>
		<span style='font:normal 12pt Arial;color:gray;'>{$info}
		&nbsp;|&nbsp;<a href=work.php>Quay về</a>
		&nbsp;|&nbsp;<a href='javascript:print();'>In ra giấy</a>
		</span><br><br>";

	$str="<table class='comicGreen'>
		<tr>
			<td>TT</td>
			<td>Mã lớp HP</td>
			<td>Tên học phần</td>
			<td>Tín chỉ</td>
			<td>Thứ</td>
			<td>Tiết</td>
			<td>Phòng</td>
		</tr>";

	$i=1;
	$tc=0;
	while($row=mysqli_fetch_array($rs)){
		$str.="<tr>
			<td>{$i}</td>
			<td>{$row['malhp']}</td>
			<td style='text-align:left;'>{$row['tenhp']}</td>
			<td>{$row['tinchi']}</td>
			<td>{$row['thu']}</td>
			<td>{$row['tiet']}</td>
			<td>{$row['phong']}</td>
		</tr>";
		$i++;
		$tc+=$row['tinchi'];
	}
	$str.="</table>";
	echo $str;
	echo "<br>Tổng tín chỉ đã đăng ký: {$tc}<br>";


	mysqli_free_result($rs);
	mysqli_close($con);

}
?>
</body>
</html>
