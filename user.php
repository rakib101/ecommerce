<!DOCTYPE html>
<html lang="en">
<!--  connect database -->
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
    <!--  CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <!-- >>>>>>>>>>>>>>>>>>> * header navbar * <<<<<<<<<<<<<<<<<<<< -->
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
              <ul class="nav navbar-nav">
                <li><a href="index.php"><b>Dashboard</b></a></li>
                <li><a href="customer.php"><b>Customer</b></a></li>
                <li><a href="voucher.php"><b>Voucher</b></a></li>
                <li class="active"><a href="user.php"><b>User</b></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
               
                <li><!--  php code for showing user name -->
                    <?php
                        if(isset($_SESSION['user_email'])){
                            $user = $_SESSION['user_email'];
                            $get_name = "select * from user where user_email = '$user'";
                            $run_name = mysqli_query($conn,$get_name);
                            $row_name = mysqli_fetch_array($run_name);
                            $u_name_f = $row_name['user_f_name'];
                            if(isset($user)){
                                echo "<a href='#' style='color:#fff;'><b>Hello, $u_name_f</b></a>";
                            }
                        }
                        else{
                            echo "<a href='#' style='color:#fff;'><b>Welcome</b></a>";
                        }
                    ?>
                </li>
                
                <li><!--  php code for login and logout -->
                    <?php 
                        if(!isset($_SESSION['user_email'])){
                            echo "<a href='login.php' style='color:#fff;' class=''><b>Login</b></a>";
                        }
                        else{
                            echo "<a href='logout.php' style='color:#fff;' class=''><b>Logout</b></a>";
                        }
                    ?>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
      
    <!-- >>>>>>>>>>>>>>>>>>> * 2nd header * <<<<<<<<<<<<<<<<<<<< -->
      
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User <small>Manage User</small></h1>
                </div>
                <div class="col-md-4" style="margin-top:15px;">
                    <img src="image/3oyIa5.png" alt="" height="40" width="50">
                </div>
                <div class="col-md-2">
                    <div class="dropdown create">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create content
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a type="button" data-toggle="modal" data-target="#addpage" href="#">Create  Voucher</a></li>
                        <li><a type="button" data-toggle="modal" data-target="#add_user" href="#">Add user</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- >>>>>>>>>>>>>>>>>>> * breadcrumb * <<<<<<<<<<<<<<<<<<<< -->
    
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li>Dashboard</li>
                <li >></li>
                <li class="active">User</li>
            </ol>
        </div>
    </section>
    
    <!-- >>>>>>>>>>>>>>>>>>> * full content part * <<<<<<<<<<<<<<<<<<<< -->
    
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!------- menu list -------->
                    <div class="list-group">
                      <a href="index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        Dashboard
                      </a>
                      
                      <a href="#" id="accordion" role="tablist" aria-multiselectable="true">
                          <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Order
                          <span class="glyphicon glyphicon-menu-down icon-one" aria-hidden="true"></span>
                          </a>
                          <!------- sub order list -------->
                          <div id="collapseOne" class=" collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                  <a href="new_order.php" class="order"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New order</a>
                              </div>
                              <div class="panel-body">
                                  <a href="order_list.php" ><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> List of Order</a>
                              </div>
                              <div class="panel-body">
                                  <a href="pending_list.php" ><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> Pending List</a>
                              </div>
                              <div class="panel-body">
                                  <a href="complete_list.php" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Complete List</a>
                              </div>
                          </div>
                      </a>
        
                      <a href="customer.php" class="list-group-item"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Customer </a>
                      <a href="voucher.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Voucher </a>
                      <a href="user.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User 
                          <span class="badge">
                          <!--  php code for couting total users -->
                              <?php 
                                $get_name = "select * from user";
                                $run_name = mysqli_query($conn,$get_name);
                                $no_row = mysqli_num_rows($run_name);
                                echo "$no_row";   
                              ?>
                          </span>
                      </a>
                    </div>
                    <!------- showing total percentage of earning -------->
                    <div class="well">
                        <h4>Total revenue this month</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                60%
                            </div>
                        </div>
                        <h4>Total revenue last month</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                40%
                            </div>
                         </div>
                    </div>
                </div>
                <!------- user information -------->
                <div class="col-md-9">
                    <div class="panel panel-default ">
                      <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">User</h3>
                      </div>
                      <div class="panel-body"> 
                          <table class="table table-striped table-hover">
                              <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th> 
                                  </tr>
                                      <?php
                                        global $conn;
                                        $select= "SELECT * FROM user ";
                                        $run = mysqli_query($conn,$select);
                                        while($check=mysqli_fetch_array($run)){
                                            $name_f = $check['user_f_name'];
                                            $name_l = $check['user_l_name'];
                                            $email = $check['user_email'];
                                            $phone = $check['user_contact'];
                                            $image = $check['user_images'];
                                    ?>
                              </thead>
                              <tr>
                                <td><img src="user_image/<?php echo $image;?>" alt="" width="60" height="60"></td>
                                <td><br><?php echo $name_f .' '. $name_l;?></td>
                                <td><br><?php echo $email;?></td>
                                <td><br><?php echo $phone;?></td>
                              </tr>
                              <?php }?>
                            </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- >>>>>>>>>>>>>>>>>>> * footer part * <<<<<<<<<<<<<<<<<<<< -->
    
    <footer id="footer">
        <p>Copyright TMS &copy; 2018</p>
    </footer>
    
    <!-- modal part-->
    
    <!-- >>>>>>>>>>>>>>>>>>> * modal part of create voucher for customer * <<<<<<<<<<<<<<<<<<<< -->
    <div class="modal fade" id="addpage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <form action="voucher.php" method="post" enctype="multipart/form-data" >
                           <label>Transaction Id</label>
                            <input type="text" class="form-control" name="search" placeholder="">
                            <button type="submit" name="click" class="btn btn-info">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- >>>>>>>>>>>>>>>>>>> * modal part of create user account * <<<<<<<<<<<<<<<<<<<< -->
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="form-group">
                        <form id="login" action="index.php" method="post" class="well" enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="" name="image" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block" name="register">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- javascript of order menu icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.collapse').on('shown.bs.collapse', function () {
                $(this).parent().find('.glyphicon-menu-down')
                                .removeClass('glyphicon-menu-down')
                                .addClass('glyphicon-menu-up');
            }).on('hidden.bs.collapse', function () {
                $(this).parent().find(".glyphicon-menu-up")
                                .removeClass("glyphicon-menu-up")
                                .addClass("glyphicon-menu-down");
            });
        });
    </script>
    
  </body>
</html>
