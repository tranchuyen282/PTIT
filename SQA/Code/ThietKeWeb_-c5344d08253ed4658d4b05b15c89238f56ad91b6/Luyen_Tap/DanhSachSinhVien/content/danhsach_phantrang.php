<?php
include '../inc/library.inc';

session_start();




if(isset($_GET["page"]))$page=$_GET["page"]+0;
else $page=1;

$num=5;                         /* So record tren moi trang web */
$start=1;
$total=1;
calculate($start,$num,$total,$page);

$sql="select * from sv limit {$start},{$num}";
$rs=mysqli_query($con,$sql);

$i=1+($page-1)*$num;//số thứ tự sv
$str='';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/danhsach.css" />
    
    <!-- custom alert -->
    <script src="../js/alert.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/alert.css">
    
</head>

<body>

<div>
        <h2>HI, Bạn <?php echo $_SESSION['hoten'] ?></h2>
        <p>
            <b>
            Danh sách lớp _phân trang
            </b>
        </p>






    <table class="responstable">
        <thead>
           
            <th>Mã số</th>
            <th>Họ tên</th>
            <th>Lớp </th>
            <th>Địa chỉ</th>
        </thead>
        <tbody>
            <?php
            
            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
            $str.="<tr>
                <td style='text-align:center'>{$row['masv']}</td>
                <td>{$row['hoten']}</td>
                <td>{$row['lop']}</td>
                <td>{$row['quequan']}</td>
            </tr>";        
            $i++;
            }
            $str.="</table>";
            echo $str;

            menu($total);
             ?>
        </tbody>
    </table>




<script src="../js/danhsach.js"></script>
</body>

</html>