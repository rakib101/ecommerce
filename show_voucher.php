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
                <li><a href="user.php"><b>User</b></a></li>
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
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Voucher <small>Show Voucher</small></h1>
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
                <li class="active">Dashboard</li>
                <li >></li>
                <li class="active">Voucher</li>
                <li >></li>
                <li class="active">Show Voucher</li>
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
                <!------- show and print voucher information -------->
                <div class="col-md-9">
                    <div class="panel panel-default ">
                      <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Edit Pages</h3>
                      </div>
                      <div class="panel-body" id="divToPrint">
                          <?php
                            if(isset($_GET['voucher_no'])){
                                $voucher_no = $_GET['voucher_no'];
                                $get_info = "select * from voucher where voucher_no='$voucher_no'";
                                $run_pro = mysqli_query($conn, $get_info); 
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                $tran_id = $row_pro['tran_id'];
                                $voucher = $row_pro['voucher_no'];
                                $tran_id = $row_pro['tran_id'];
                                $name = $row_pro['name'];
                                $phone = $row_pro['phone'];
                                $order_date = $row_pro['order_date'];
                                $delivery_date = $row_pro['delivery_date'];
                                $total = $row_pro['total'];
                                $paid = $row_pro['paid'];
                                $due = $row_pro['due'];
                                $address = $row_pro['address'];
                          ?> 
                          <form>
                              <table align="center" width="500" border="2">
                                  <tr>
                                      <td colspan="8" ><h2 align="center">Payment Voucher</h2><br>
                                          <label align="left">Transaction Id</label>
                                          <input type="text" class="" placeholder="" value="<?php echo $tran_id ?>">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" ><h4 align="center">Pricing</h4>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" align="center" height="50">
                                          <label >Total Price</label>
                                          <input type="text" class="" name="total" placeholder="" value="<?php echo $total ?>">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td  align="center" width="250" height="50">
                                          <label >Paid</label>
                                          <input type="text" class="" name="paid" placeholder="" value="<?php echo $paid ?>">
                                      </td>
                                      <td  align="center" width="250" height="50">
                                          <label >Due</label>
                                          <input type="text" class="" name="due" placeholder="" value="<?php echo $due ?>">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" align="center" height="50">
                                          <label >Customer Name</label>
                                          <input type="text" class="" name="c_name" placeholder="" value="<?php echo $name ?>">
                                      </td>
                                  </tr>             
                                  <tr>
                                      <td colspan="8" align="center" height="50">
                                          <label >Customer phone</label>
                                          <input type="text" class="" name="phone" placeholder="" value="<?php echo $phone ?>">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td  align="center" width="250" height="50">
                                          <label >Order Date</label>
                                          <input type="text" id="start" name="order_date" min="2018-01-01" value="<?php echo $order_date ?>">
                                      </td>
                                      <td  align="center" width="250" height="50">
                                          <label >Delivery Date</label>
                                          <input type="text" id="end" name="delivery_date" min="2018-01-01" value="<?php echo $delivery_date ?>">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" ><h4 align="center">Customer Address</h4>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" align="center">
                                          <textarea name="c_address" id="" cols="40" rows="5" ><?php echo $address ?></textarea>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" height="50">
                                          <label>Voucher No.</label>
                                          <input type="text" class="" placeholder="" value="<?php echo $voucher ?>">
                                          <label align="right" class="signature">Signature:</label>
                                      </td>
                                  </tr>
                             </table>
                
                          <?php }}?>
                          </form>
                      </div>
                      <input value="Print" onclick="myFunction();" class="btn  main-color-bg" align="center">
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
    
    <!-- javacript function to print voucher-->
    <script type="text/javascript">
        
        function myFunction() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=600,height=700');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
        
    </script>
    
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