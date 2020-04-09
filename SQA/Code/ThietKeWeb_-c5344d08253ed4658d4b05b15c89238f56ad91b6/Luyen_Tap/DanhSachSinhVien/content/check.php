<?php 
include "../inc/connect.inc";

if(isset($_POST['user']) && isset($_POST['pass'])) {
	//lấy dữ liệu người dùng từ form login: index.php
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	// check hợp lệ dữ liệu và return kết quả tương ứng
	//user: dài 3 ký tự, pass phải là số
	$response = "";
	if (strlen($user) != 3) {
		$response .= 'user dài 3 ký tự bạn ơi' . '</br>';
	}
	if (!is_numeric($pass)) {
		$response .= 'mật khẩu phải là số bạn ơi';
	}

	//nếu thỏa mãn điều kiện : $response="" ==> mới kiểm tra user và pass có tồn tại hay không
	if($response == "") {

		include '../inc/library.inc';

		if (checkUser($user,$pass)!='') {
			$user = checkUser($user,$pass);

			session_start();
			$_SESSION['masv'] = $user['masv'];
			$_SESSION['hoten'] = $user['hoten'];
			
			echo 'hi, ' . $_SESSION['hoten']. '<a href="content/danhsach.php" style="color:red">next</a>' ;

			//ẩn đi phần đăng nhập
			echo '<script>$(".input-container").hide();
			$(".button-container").hide();</script>';
		} else {
			$response = "sai pass or user";
		}
	}
echo $response;
//in ra ==> response dạng text : qua ajax
	
}
else {
	echo("bạn phải nhập đầy đủ thông tin!!");
}
 ?>
