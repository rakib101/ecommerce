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
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> New Order <small>Manage Order</small></h1>
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
                <li class="active">New Order</li>
            </ol>
        </div>
    </section>
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
                <!------- place an order part -------->
                <div class="col-md-9">
                    <div class="panel panel-default ">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Order Details</h3>
                        </div>
                        <div class="panel-body">
                            <form action="new_order.php" method="post" enctype="multipart/form-data" >
                                <table align="center" width="600" border="2">
                                    <tr>
                                        <td colspan="8" align="center"><h2>Place an order</h2></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b class="text_color">Transaction ID:</b></td>
                                        <td><input type="text" name="tran_id" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b class="text_color">Category:</b></td>
                                        <td>
                                        <div class="form">
                                            <div class="categories">
                                                <p>
                                                    <input type="radio" name="s" value="Shirt" id="shirtCheck" checked onchange="total()">
                                                    <label for="shirt" > Shirt </label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="s" value="Pant" id="pantCheck" onchange="total()">
                                                    <label for="pant"> Pant </label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="s" value="Panjabi" id="panjabiCheck" onchange="total()">
                                                    <label for="panjabi"> Panjabi </label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="s" value="Paijama" id="paijamaCheck" onchange="total()">
                                                    <label for="paijama"> Paijama </label>
                                                </p>
                                              <br>
                                            </div>
                                            <!------- measurement of shirt -------->
                                            <div class="size">
                                                <div class="shirt" id="shirt_text">
                                                    <table class="custom_class">
                                                        <tr class="row_margin">
                                                            <td><b>Neck:</b></td>
                                                            <td><input type="text" name="neck"></td>
                                                        </tr>
                                                        <tr class="row_margin">
                                                            <td><b>Sleeve:</b></td>
                                                            <td><input type="text" name="sleeve"></td>
                                                        </tr>
                                                        <tr class="row_margin">
                                                            <td><b>Cuff:</b></td>
                                                            <td><input type="text" name="cuff"></td>
                                                        </tr>
                                                        <tr class="row_margin">
                                                            <td><b>Chest:</b></td>
                                                            <td><input type="text" name="chest"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!------- measurement of Pant -------->
                                                <div class="pant" id="pant_text">
                                                    <table class="custom_class">
                                                        <tr>
                                                            <td><b>Waist:</b></td>
                                                            <td><input type="text" name="waist"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Rise:</b></td>
                                                            <td><input type="text" name="rise"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Inseam:</b></td>
                                                            <td><input type="text" name="inseam"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Outseam:</b></td>
                                                            <td><input type="text" name="outseam"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!------- measurement of Panjabi -------->
                                                <div class="panjabi" id="panjabi_text">
                                                    <table class="custom_class">
                                                        <tr>
                                                            <td><b>Neck:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Sleeve:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Chest:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Length:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!------- measurement of Paijama -------->
                                                <div class="paijama" id="paijama_text">
                                                    <table class="custom_class">
                                                        <tr>
                                                            <td><b>Waist:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Inseam:</b></td>
                                                            <td><input type="text" name="" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Outseam:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Length:</b></td>
                                                            <td><input type="text" name=""></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                      </td>
                                  </tr>
                                  <!------- Quantity of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Quantity:</b></td>
                                      <td><select name="quantity" required>
                                          <option value="" disabled selected>Select Option</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <!------- design of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Design:</b></td>
                                      <td><input type="file" name="design" class="form-control"></td>
                                  </tr>
                                  <!------- total price of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Total price:</b></td>
                                      <td><input type="text" name="total_price" class="form-control" required></td>
                                  </tr>
                                  <!------- total paid of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Paid:</b></td>
                                      <td><input type="text" name="paid" class="form-control" required></td>
                                  </tr>
                                  <!------- total due of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Due:</b></td>
                                      <td><input type="text" name="due" class="form-control" required></td>
                                  </tr>
                                  <!------- customer name -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Customer Name:</b></td>
                                      <td><input type="text" name="c_name" class="form-control" required></td>
                                  </tr>
                                  <!------- customer phone number -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Customer Phone:</b></td>
                                      <td><input type="text" name="c_phone" class="form-control" required></td>
                                  </tr>
                                  <!------- order date of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Order Date:</b></td>
                                      <td>
                                          <input type="date" id="start" name="order_date" min="2018-01-01" class="form-control" required>
                                      </td>
                                  </tr>
                                  <!------- delivery date of product -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Delivery Date:</b></td>
                                      <td>
                                          <input type="date" id="end" name="delivery_date" min="2018-01-01" class="form-control" required>
                                      </td>
                                  </tr>
                                  <!------- customer address -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Customer Address:</b></td>
                                      <td>
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <textarea name="c_address" class="form-control"  id="" cols="50" rows="5"></textarea>
                                                  </div>
                                              </div>
                                           </div>
                                       </td>
                                  </tr>
                                  <!------- Voucher number -------->
                                  <tr>
                                      <td align="right"><b class="text_color">Voucher no:</b></td>
                                      <td><input type="text" name="voucher" class="form-control" value="<?php createRandomVoucher();?>" required></td>
                                  </tr>
                                  <tr>
                                      <td colspan="8" align="center"><input type="checkbox" name="status" value="Pending" required> <b>Pending</b><br><br></td>
                                  </tr>
                                  <tr align="center">
                                      <td colspan="8"><input type="submit" class="btn-primary btn-lg btn-block " name="insert_post" value="Order"></td>
                                  </tr>
                                 </table>
                            </form>
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
    
    <!-- >>>>>>>>>>>>>>>>>>> * php code of palce an order * <<<<<<<<<<<<<<<<<<<< -->
    <?php
      if(isset($_SESSION['user_email']))
      {
        if(isset($_POST['insert_post'])){
            $category = $_POST['s'];
            $neck = $_POST['neck'];
            $sleeve = $_POST['sleeve'];
            $cuff = $_POST['cuff'];
            $chest = $_POST['chest'];
            $waist = $_POST['waist'];
            $rise = $_POST['rise'];
            $inseam = $_POST['inseam'];
            $outseam = $_POST['outseam'];
            $customer_name = $_POST['c_name'];
            $customer_phone = $_POST['c_phone'];
            $order_date = $_POST['order_date'];
            $delivery_date = $_POST['delivery_date'];
            $total = $_POST['total_price'];
            $paid = $_POST['paid'];
            $due = $_POST['due'];
            $address = $_POST['c_address'];
            $trans_id = $_POST['tran_id'];
            $voucher = $_POST['voucher'];
            $quantity = $_POST['quantity'];
            $status = $_POST['status'];
            
            $product_image = $_FILES['design']['name'];
            $product_image_tmp = $_FILES['design']['tmp_name'];

            move_uploaded_file($product_image_tmp,"product_design/$product_image");
            
            $sql_e = "SELECT tran_id FROM order_info WHERE tran_id='$trans_id'";
            $check_query = mysqli_query($conn,$sql_e);
            $no_row = mysqli_num_rows($check_query);
            if($no_row>0){
                echo "<script>alert('This transaction id is already used')</script>";
                echo "<script>window.open('new_order.php','_self')</script>";
            }
            else{
               /*this query insert size information in category table*/
                $insert_product = "insert into category(cat,tran_id,neck,sleeve,cuff,chest,waist,rise,inseam,outseam,design) values('$category','$trans_id','$neck','$sleeve','$cuff','$chest','$waist','$rise','$inseam','$outseam','$product_image');";
                /*this query insert order information in order_info table*/
                $insert_product .= "insert into order_info(tran_id,category,order_date,delivery_date,total_price,paid,due,design,quantity,customer_name,customer_address,customer_phone,voucher,status) values('$trans_id','$category','$order_date','$delivery_date','$total','$paid','$due','$product_image','$quantity','$customer_name','$address','$customer_phone','$voucher','$status');";

                if($conn->multi_query($insert_product) === true){
                    echo "<script>alert('product has been inserted successfully!')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                } 
            }
        }
      }
    ?>
    <?php
        function createRandomVoucher() { 

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz0123456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 

        while ($i <= 4) { 
            $num = rand() % 50; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 

        echo $pass; 

    }   
    ?>
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
    <!-- javascript of category radio button -->
    <script>
        function total(){
        function myFunction() {
  
        if (document.getElementById("shirtCheck").checked ==true){
            document.getElementById("shirt_text").style.display = "block";
        }
        else{
            document.getElementById("shirt_text").style.display = "none";
        }
        if (document.getElementById("pantCheck").checked ==true){
            document.getElementById("pant_text").style.display = "block";
        }
            else{
              document.getElementById("pant_text").style.display = "none";  
            }
        if (document.getElementById("panjabiCheck").checked ==true){
            document.getElementById("panjabi_text").style.display = "block";
        } 
            else{
                document.getElementById("panjabi_text").style.display = "none";
            }
        if (document.getElementById("paijamaCheck").checked ==true){
            document.getElementById("paijama_text").style.display = "block";
        }
            else{
                document.getElementById("paijama_text").style.display = "none";
            }
       
    }
    myFunction();
    }
    </script>
  </body>
</html>