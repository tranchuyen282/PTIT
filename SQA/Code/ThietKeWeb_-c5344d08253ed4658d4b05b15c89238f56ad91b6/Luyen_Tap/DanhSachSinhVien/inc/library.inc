<?php
include 'connect.inc';
	//kiểm tra user, pass --> check.php
	function checkUser($user,$pass)
	{
		global $con;
		$sql = "select * from sv where masv= '$user' ";

		$rs = mysqli_query($con,$sql);
		if(mysqli_num_rows($rs)>0) {
			while ($row = mysqli_fetch_array($rs)) {
				if($pass == $row['matkhau'])
					return $row;
			}
		}
		
		return '';
	}

	//in danh sách sinh viên
	function listSV()
	{
		global $con;
		$sql = "select * from sv " ;
		$rs = mysqli_query($con,$sql);

		$listSV='';
		if(mysqli_num_rows($rs)>0) {
			while ($row = mysqli_fetch_array($rs)) {
				$listSV.="<tr>
					<td>{$row['masv']}</td>
					<td>{$row['hoten']}</td>
					<td>{$row['lop']}</td>
					<td>{$row['quequan']}</td>
				</tr>";
			}
		}
		mysqli_free_result($rs);
		
		return $listSV;
	}

	function listSVTheoLop($lop)
	{
		global $con;
		$sql = "select * from sv where lop='$lop'" ;
		$rs = mysqli_query($con,$sql);

		$listSV='';
		if(mysqli_num_rows($rs)>0) {
			while ($row = mysqli_fetch_array($rs)) {
				$listSV.="<tr>
					<td>{$row['masv']}</td>
					<td>{$row['hoten']}</td>
					<td>{$row['lop']}</td>
					<td>{$row['quequan']}</td>
				</tr>";
			}
		}
		mysqli_free_result($rs);

		return $listSV;
	}

	// danh sách các lớp
	function listLop(){
	global $con;

	$sql="Select distinct lop from sv";
	$rs=mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($rs)){
		$str.="<option value={$row['lop']}>{$row['lop']}</option>";
	}
	mysqli_free_result($rs);

	echo $str;
	}


	//phân trang
function calculate(&$s,$n,&$t,$p){
	global $con;
  $sql="select * from sv";
  $rs=mysqli_query($con,$sql);

  $r=mysqli_num_rows($rs);
  $s=($p-1)*$n;
  $t=ceil($r/$n);
}

// số trang
function menu($s){
   $str="<div style='width:570px;'>
         <hr>
	 <br>
	 <span style='float:right;background-color:yellow;'>";	

   for($page=0;$page<$s;$page++){
	$j=$page+1;
	$symbol=($j<$s?" | ":"");
	$str.="<a href='danhsach_phantrang.php?page={$j}'>{$j}</a>{$symbol}";
   }	
   $str.="</span></div>";
   echo $str;
}


// đã đăng ký tín chỉ hay chưa
function isRegistered($code){
  $ok=false;
  include("connect.inc"); 
  $sql="select * from dk where masv='{$code}'";
  $rs=mysqli_query($con,$sql);
  if(mysqli_num_rows($rs)>0) $ok=true;

  return $ok;
}

?>