<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">

        <script src="js/jquery-3.2.1.min.js">
        </script>

        
    </head>
    <body>
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Material Login Form</h1><span>Pen <i class='fa fa-code'></i> by <a href=''>Sư phạm ĐN</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>

<!-- form login và register -->
<div class="container">
    <!-- form login -->
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <!-- redirect qua trang check: <form method="post" action="content/check.php">  -->
    <!-- không dùng ajax <form method="post" action=""> -->
      <div class="input-container">
        <input type="text" id="Username" required="required" name="user" />
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required" name="pass"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>

      <!-- <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div> -->
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">hiển thị thông báo tại đây</a></div>
    <!-- </form> -->
  </div>
    <!-- ending form login -->

    <!-- form register -->
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<!-- ending two form: login and register -->


<!-- Portfolio--><a id="portfolio" href="" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
    
<script src="js/index.js">
 </script>

<script>
  $(document).ready(function(event){ 
  // $('.footer').hide();

    $("button").click(function(){
    us=$("#Username").val(); 
    pass=$("#Password").val();


        $.post("content/check.php",
        {
          user:us,
          pass:pass
        },
        function(data){
      //$('#result').show();
        // $('.footer').slideDown("fast");
            $(".footer").html(data);
        });
    });
});
</script>
</body>
</html>



