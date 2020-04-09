<?php
session_start();
ob_start();
$str="";

include("../inc/library.inc");
$code=$_SESSION['masv'];
if(isRegistered($code)){
    echo "<div>
    <img src='pic/male.gif' style='float:left' />
    <H4 style='color:red'>Bạn đã đăng ký!</H4>  
    <a href=work.php style='float:right'>Quay về</a>
    <br>
    </div>";
}
else {
    echo "<p style='font:normal 10pt Arial;color:blue;'>
              <img src='pic/dhdn.gif' /> 
              <h3 style='color:red'>ĐĂNG KÝ HỌC PHẦN</h3>
              {$_SESSION['hoten']} 
              &nbsp; | &nbsp; <a href=work.php>   Quay về </a>
              &nbsp; | &nbsp; <a href=login.html> Thoát   </a>
          </p>";

   
    $sql="select hp.mahp,hp.tenhp,hp.tinchi,gv.hoten,tk.thu,tk.tiet,tk.phong 
          from hp inner join tk on hp.mahp=left(tk.malhp,3) 
          inner join gv on tk.magv=gv.magv order by tk.thu,tk.tiet";

    $rs=mysqli_query($con,$sql);
    $str="<table class='responstable'>
        <form method=post action=save_register.php>
        <thead>
            <th>TT</th>
            <th>MaHP</th>
            <th>Tên học phần</th>
            <th>Tín chỉ</th>
            <th>Giáo viên</th>
            <th>Chọn</th>
            <th>Thứ</th>
            <th>Tiết</th>
            <th>Phòng</th>
        </thead> <tbody>";
    $i=1;
    while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
        $str.="<tr>
            <td>{$i}</td>
            <td>{$row['mahp']}</td>
            <td style='text-align:left;'>{$row['tenhp']}</td>
            <td>{$row['tinchi']}</td>
            <td style='text-align:left;'>{$row['hoten']}</td>
            <td>
                <input type=checkbox class=hp name=hp[]  value='{$row["mahp"]},{$row["thu"]},{$row["tiet"]},{$row["tinchi"]}' onclick='check(this)' >
            </td>
            <td>{$row['thu']}</td>
            <td>{$row['tiet']}</td>
            <td>{$row['phong']}</td>
        </tr>";
        $i++;
    }

    $str.='<tr>
                <td>
                    <input type="submit" disabled onclick="dangKy() " id="dangKy" value="Đăng ký " />
                </td>
            </tr>
            <tr>
                <td>
                    tổng tín chỉ được chọn là <span style="color:red" id="tongTC"></span>
                </td>
            </tr>     
        </form>
        </tbody>
        </table>';
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/dangkytinchi.css" rel="stylesheet">
    <link href="../css/alert.css" rel="stylesheet">

    <script src="../js/dangkytinchi.js"></script>
    <script src="../js/alert.js"></script>

</head>

<body>

    <div>
        <h2>chào bạn đến với trang đăng ký tín chỉ</h2>
        <p>
            <b>
            ++bạn chỉ có thể đăng ký các môn không trùng nhau, không cấn lịch học (thứ và tiết)
            </b>
        </p>

        <p>
            <b>++khi bạn đăng ký đủ tín chỉ <span style="color:red">(7-10) </span> , bạn có thể bấm nút 'Đăng ký các học phần' để hoàn thành</b>
        </p>
    </div>

    
<?php 
 echo $str;

    @mysqli_free_result($rs);
    @mysqli_close($con);
    @ob_flush();

 ?>
</html>