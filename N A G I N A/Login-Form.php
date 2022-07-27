<?php  
    
        //login.php
        session_start();
        if(isset($_SESSION["name"]))
        {
         header('location: index.php');
        }
    
    ?>  
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Login To DataBase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">

</head>
<body id="top">
<div class="page_loader"></div>

<!-- Login 14 start -->
<div class="login-14">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-section">
                    <div class="form-inner">
                        <div class="details">
                            <h3>Sign Into Your Account</h3>
                            <p id="error_message"></p>
                            <form action="" method="POST" id="login_form">
                                <div class="form-group clearfix">
                                    <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                                </div>
                                <div class="form-group clearfix">
                                    <input name="password" type="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
                                </div>
                                <div class="form-group clearfix fg">
                                    <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-theme"><span>Login</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 14 end -->

<!-- External JS libraries -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/app.js"></script>
<!-- Custom JS Script -->

<script>
    $(document).ready(function(){
     $('#login_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"check_login.php",
       method:"POST",
       data:$(this).serialize(),
       success:function(data){
        if(data != '')
        {
            
            window.location = 'index.php';
        }
        else
        {
            $('#error_message').html(data);
        }
       }
      })
     });
    });
    </script>
</body>
</html>
