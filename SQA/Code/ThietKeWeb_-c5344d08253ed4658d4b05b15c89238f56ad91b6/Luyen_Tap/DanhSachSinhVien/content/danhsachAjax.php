<?php 
include '../inc/library.inc';

 $str='';
	if(isset($_GET['lop'])){
		$lop = $_GET['lop'];

		 $str .= listSVTheoLop($lop);	 
	}



	
echo $str;
 ?>