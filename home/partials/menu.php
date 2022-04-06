<?php 
  
  include('../config/constants.php'); 
?>
  

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>VIRTUE MARKET</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="./css/css.css">
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- <link rel="stylesheet" href="../css/vertical-layout-light/style.css"> -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />

	<style>
	.main-content-a{

	background-color: #f1f2f6;
	padding:3% 0;
	}
	.col-4-a
{
    width: 18% ;
    background-color:#fff;
    margin: 1%;
    padding: 2%;
    float: left;
}
          .wrapper-m{
				padding:1%;
				width: 80%;
				margin: 0 auto;
			}
			.menu-m{
				text-align: center;
			}
			.menu-m ul{
				list-style-type: none;
			}	
			.menu-m ul li {
				display:inline;
				padding:1%;
			}
			.menu-m ul li a:hover{
				opacity: 0.7;
			}
			.content-table {
				
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			}

.text-red{

	margin: auto ;

}
.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

			

      </style>


</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a  <?php if(!isset($_SESSION['userH'])){ echo " href='#'";}else{echo " href='logout.php'";} ?>   data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> <?php if(!isset($_SESSION['userH'])) {echo "Sign In";}else{echo "Log Out";}?>   </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="../admin/index.php">Admin</a></li>
			
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
				<?php
                      if(isset($_SESSION['add']))
                      {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                      }
					  if(isset($_SESSION['login']))
                      {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                      }
                  ?>
			<form action="" method="post">
					<input type="search" name="keyword" placeholder="Search here..." required="">
					<input type="submit" value=" " name="search">
				<div class="clearfix"></div>
			</form>
			<?php
                    if(isset($_POST['search']))
                    {
                      $keyword = $_POST['keyword'];
					  
                     
                       echo("<script>location.href = '".SITEURL."home/product.php?key=$keyword';</script>");
                    }
                  ?>
			<?php
                    if(isset($_POST['search']))
                    {
                      $keyword = $_POST['keyword'];
                     
                       echo("<script>location.href = '".SITEURL."admin/product.php?key=$keyword';</script>");
                    }
                  ?>		  
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="home.php"><span>V</span>irtue Market <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						



		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">

				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="home.php">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clothing <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="images/top2.jpg" alt=" "/></a>
									</div>

									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
					  						<?php
											  $sql="SELECT * FROM tbn_product_category where category_id=24 ";
											  $res=mysqli_query($conn,$sql);
											  if($res==true)
											  {
												  $count=mysqli_num_rows($res);
												  if($count>0)
												  {
													  while($rows=mysqli_fetch_assoc($res)){
														  $id=$rows['id'];
														  $name=$rows['name'];
														  $image=$rows['image'];
														  
														  echo("<li><a href='product.php?id=$id&Cid=24'>$name</a></li>");
														 }
												  }
											  }
											?>  
										</ul>
									</div>

									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Furniture <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
										<?php
											  $sql="SELECT * FROM tbn_product_category where category_id=25 ";
											  $res=mysqli_query($conn,$sql);
											  if($res==true)
											  {
												  $count=mysqli_num_rows($res);
												  if($count>0)
												  {
													  while($rows=mysqli_fetch_assoc($res)){
														  $id=$rows['id'];
														  $name=$rows['name'];
														  $image=$rows['image'];
														  
														  echo("<li><a href='product.php?id=$id&Cid=25'>$name</a></li>");
														 }
												  }
											  }
											?>  
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
										
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.html"><img src="images/images.jpg" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="menu__item dropdown">
					<a href="" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cosmetology <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
										<?php
											  $sql="SELECT * FROM tbn_product_category where category_id=26 ";
											  $res=mysqli_query($conn,$sql);
											  if($res==true)
											  {
												  $count=mysqli_num_rows($res);
												  if($count>0)
												  {
													  while($rows=mysqli_fetch_assoc($res)){
														  $id=$rows['id'];
														  $name=$rows['name'];
														  $image=$rows['image'];
														  
														  echo("<li><a href='product.php?id=$id&Cid=26'>$name</a></li>");
														 }
												  }
											  }
											?>  
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
										
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.html"><img src="images/Category_542.jpg" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					
					<?php
						if(isset($_SESSION['userH']))
						{
							$idCart=$_SESSION['userH'];
							echo(" <li class=' menu__item'><a class='menu__link' href='infor.php?id=$idCart'>My Profile</a></li>");
						}
					?>
					<?php
						if(isset($_SESSION['userH']))
						{
							$idCart=$_SESSION['userH'];
							$sql0="select * from tbn_account where id=$idCart ";
							$res0=mysqli_query($conn,$sql0);
							$rows0=mysqli_fetch_assoc($res0);
							$typeaccount_id=$rows0['typeaccount_id'];
							if($typeaccount_id==3)
							{
								echo(" <li class=' menu__item'><a class='menu__link' href='myProduct.php?id=$idCart'>My Shop</a></li>");

							}
							else
							{
								if($typeaccount_id==31)
								{
								echo(" <li class=' menu__item'><a class='menu__link'><input type='submit' name='isSell' value='Register to Seller'  style=' border:none;color:black;'></a></li>");

								}
								else
								{
								echo(" <li class=' menu__item'><a class='menu__link'><input type='submit'  value='Registered Seller'  style=' border:none;color:black;'></a></li>");

								}
								
							}
						}

						
					
					?>
					
				  </ul>

				</div>
				</form>
				<?php
						if(isset($_POST['isSell']))
						{
							$sql0="update tbn_account set typeaccount_id=33  where id=$idCart ";
							$res0=mysqli_query($conn,$sql0);
							$_SESSION['login']="<p class='card-description'>Registered sell successfully</p>";
							
						}
				?>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						<form <?php if(!isset($_SESSION['userH'])) {  echo ("action=''");}else {$idCart=$_SESSION['userH']; echo("action='cart.php?id=$idCart'") ;}?>  method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button  class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
  
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="usernameSI" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="passwordSI" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit"name="submitSingIn" value="Sign In">
						</form>

						<?php
							
							if (isset($_POST['submitSingIn']))
							{
								$username = $_POST['usernameSI'];
								$password = md5($_POST['passwordSI']);

							$sql="select * from tbn_account where 
									username='$username' and password='$password' ";

							$res=mysqli_query($conn,$sql);


							$count = mysqli_num_rows($res);

								if($count==1)
								{
									$rows=mysqli_fetch_assoc($res);
									$idU=$rows['id'];

									$_SESSION['userH']=$idU;

									$_SESSION['login']="<p class='card-description'> Login Successful</p>";
									echo("<script>location.href = '".SITEURL."home/home.php';</script>");

								}
								else{
									$_SESSION['login']="<p class='card-description'> Username or password incorrect</p>";
									echo("<script>location.href = '".SITEURL."home/home.php';</script>");

								}
							}

						?>




						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="NameUser" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="PhoneUser" required="">
								<label>Phone</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="AddressUser" required=""> 
								<label>Address</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="email" name="EmailUser" required=""> 
								<label>Email</label>
								<span></span>
							</div> 

							<div class="styled-input">
								<input type="password" name="passwordUser" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="ConfirmPasswordUser" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" name="submitSingUp" value="Sign Up">
						</form>

						<?php 
						 if(isset($_POST['submitSingUp']))
						 {
							 $name = $_POST['NameUser'];
							 $phone = $_POST['PhoneUser'];
							 $email = $_POST['EmailUser'];
							 $address = $_POST['AddressUser'];
							 $password = md5($_POST['passwordUser']);
							 $rePassword = md5($_POST['ConfirmPasswordUser']);
							
							 $sql = "SELECT * FROM tbn_account where username='$email'";
							 $res=mysqli_query($conn,$sql);
							 if($res==true){	
								$count=mysqli_num_rows($res);
								if($count>0){
									$_SESSION['login']="<p class='card-description'>Email already exists</p>";
										echo("<script>location.href = '".SITEURL."home/home.php';</script>");
								}
								else{
									if($password!=$rePassword)
									{
										$_SESSION['login']="<p class='card-description'>Password and Confirm Password are not the same</p>";
										echo("<script>location.href = '".SITEURL."home/home.php';</script>");

									}
									else{
										$sql3="INSERT INTO tbn_account set 
										username='$email', password='$password',
										typeaccount_id=31,name='$name',phone='$phone',address='$address'";
										$res3=mysqli_query($conn,$sql3);
										$_SESSION['login']="<p class='card-description'>Register successfully</p>";
										echo("<script>location.href = '".SITEURL."home/home.php';</script>");
									}
								}
							 }
							 else{
								echo("<script>location.href = '".SITEURL."home/detail.php?id=60';</script>");
							 }

							
						 }
						?>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->

<div id="toast">
	<!-- <div class="toast" >
		<div class="toast__icon">
		:v
		</div>
		<div class="toast__body">
			 <h3 class="toast__title">Success</h3>
			 <p class="toast__msg">
			 Các bạn subscribe kênh Youtube F8 Official để nhận thông bá
			 </p>
		</div>
		<div class="toast__close">
		X
		</div>
	</div> -->
</div>

<?php
 if(isset($_POST['submitPay']))
 {
	if($_SESSION['userH']=="")
	{
		$_SESSION['login']="<p class='card-description'>You must Login 1</p>";
		echo("<script>location.href = '".SITEURL."home/home.php';</script>");
	}
	else{
		$idUer=$_SESSION['userH'];
		$total=$_POST['total'];
		$total=trim($total,"Subtotal:$ USD");
		$date=date("Y-m-d H:i:s");
		$sql2="INSERT INTO tbn_bill set 
     	status='Ordered',date='$date', total=$total,user_id=$idUer";
		      $res2=mysqli_query($conn,$sql2);
			  if($res2==true){
				$_SESSION['login']="<p class='card-description'>Order successfully</p>";
				echo("<script>location.href = '".SITEURL."home/home.php';</script>");		
		
			  }
			  else{
				$_SESSION['login']="<p class='card-description'>Failed to Order </p>";			  
				echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
			  }

	}

 }
?>