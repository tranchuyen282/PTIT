<?php
include '../inc/library.inc';

session_start();
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
            abc
            </b>
        </p>

<!-- menu/list option lớp. quận huyện tỉn -->
        <div class="">
          <select id='lop'  placeholder="--">
            <?php echo listLop(); ?>
          </select>
        </div>

</div>




    <table class="responstable">
        <thead>
           
            <th>Mã số</th>
            <th>Họ tên</th>
            <th>Lớp </th>
            <th>Địa chỉ</th>
        </thead>
        <tbody>
           
        </tbody>
    </table>


<script>
  $(document).ready(function(event){ 
    $("select").change(function(){
    lop=$("#lop").val();
    // pass=$("#Password").val();
        $.get("danhsachAjax.php",
        {
          lop: lop,
          // pass:pass
        },
        function(data){
            $("tbody").html(data);
        });
    });
});
</script>

<script src="../js/danhsach.js"></script>
</body>

</html>