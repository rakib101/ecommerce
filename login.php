<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("dbcon.php");
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/favicon.ico"/>
    <title>TMS</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="image/809HRD.png" alt="" height="50"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="margin-top:20px;text-align:center;">
              <img class="text-center" src="image/3oyIa5.png" alt="" height="40" width="50">
          </div>
        </div>
      </div>
    </header>

    <section id="login">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="login" class="well" method="post">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn btn-default btn-block" name="login">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>
    
    
    <?php
    if(isset($_POST['login'])){
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];
        $sel_c = "select * from user where user_pass ='$c_pass' AND user_email='$c_email'";
        $run_c = mysqli_query($conn,$sel_c);
        $check_user = mysqli_num_rows($run_c);
        if($check_user==0){
            echo "<script>alert('Email or Password is incorrect')</script>";
            exit();
        }
        else{
            $_SESSION['user_email']=$c_email;
            echo "<script>alert('you logged in successfully, Thanks')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        
        
    }
?>
  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
