<?php include('./partials/menu.php'); ?>

 <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];      
        $sql="select * from tbn_product where id=$id";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
          $rows=mysqli_fetch_assoc($res);
		  $name = $rows['name'];
		  $price=$rows['price'];
                                  $description=$rows['description'];
                                  $typeProduct=$rows['product_category_id'];
                                  $status=$rows['status'];
                                  $vendorId=$rows['vendor_id'];
                                  $image=$rows['image'];    
        }
        else{
          $_SESSION['add']="<p class='card-description' style='color:green;'>Product not found</p>";
      echo("<script>location.href = '".SITEURL."home/home.php';</script>");
        }
    }
    else{
      echo("<script>location.href = '".SITEURL."home/home.php';</script>");
    }
?>  


<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Single <span> Page </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Single Page</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>">
							<div class="thumb-image"> <img src="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>">
							<div class="thumb-image"> <img src="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>">
							<div class="thumb-image"> <img src="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo$name; ?></h3>
					<p><span class="item_price">$<?php echo$price; ?></span> <del>- $900</del></p>
					<!-- <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div> -->

					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quality :</h5>
							<select id="country1" name="quantityP" onchange=" myFunction()" class="frm-field required sect">
								<option value="1">1 Qty</option>
								<option value="2">2 Qty</option> 
								<option value="5">5 Qty</option>					
								<option value="10">10 Qty</option>								
							</select>
						</div>
					</div>
					<!-- <div class="occasional">
						<h5>Types :</h5>
						<div class="colr ert">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Sneakers </label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
						</div>
						<div class="clearfix"> </div>
					</div> -->
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>

																	<input type="hidden" name="idProduct" value="<?php echo $id; ?>" />
																	<input type="hidden" name="add"  id="addQuantity" value="1" />
																	<input type="hidden" name="item_name" value="<?php echo $name; ?>" />
																	<input type="hidden" name="amount" value="<?php echo $price; ?>" />
																	<input type="hidden" name="discount_amount" value="" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="submit" name="addToCart" value="Add to cart" class="button" />


																</fieldset>
															</form>
														</div>
																			
					</div>
					<!-- <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
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
														</ul> -->
					
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Comment</li>

						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							<p> <?php echo $description; ?> </p>
							  </div>
						</div>
						<!--//tab_one-->
						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls" style="padding-top:7px;">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
									<?php
								
										$sqlC = "SELECT * FROM tbn_comment where product_id=$id";
										$resC=mysqli_query($conn,$sqlC);
										$countC=mysqli_num_rows($resC);
										if($countC>0)
										{
											while($rowsC=mysqli_fetch_assoc($resC))
											{
												$description = $rowsC['description'];
												$account = $rowsC['account_id'];
												?>
													<div class="bootstrap-tab-text-grid-right " >
														<ul>
														<?php
															$sqlA = "SELECT * FROM tbn_account where id=$account";
															$resA=mysqli_query($conn,$sqlA);
															$countA=mysqli_num_rows($resA);
															if($countA>0)
															{
																$rowsA=mysqli_fetch_assoc($resA);
																$nameA=$rowsA['name'];
															}
														?>
															<li><a ><?php echo $nameA ?></a></li>	
														</ul>
														<p style="margin-top:7px; margin-bottom:15px; ">
														<?php echo $description ?>
														</p>
													</div>
												<?php
											}
										}
									?>
										


										<div class="clearfix"> </div>
						             </div>
									 <div class="add-review">
										<h4>add a review</h4>
										<form action="" method="post">
												<textarea name="Message" required=""></textarea>
											<input type="submit" name="comment" value="SEND">
										</form>

										<?php
											if(isset($_POST["comment"]))
											{

												if(!isset($_SESSION['userH']))
												{
													$_SESSION['login']="<p class='card-description'>You must login</p>";
													echo("<script>location.href = '".SITEURL."home/detail.php?id=$id';</script>");
												}
												else{
													$idA=$_SESSION['userH'];
													$description=$_POST["Message"];
													$sql="insert into tbn_comment set account_id=$idA ,description='$description',product_id=$id; ";
													$res=mysqli_query($conn,$sql);
													if($res==true){
														$_SESSION['login']="<p class='card-description'>Comment successfully</p>";
														echo("<script>location.href = '".SITEURL."home/detail.php?id=$id';</script>");
												
												
													  }
													  else{
														$_SESSION['login']="<p class='card-description'>Failed to Comment  </p>";
													  
														echo("<script>location.href = '".SITEURL."home/detail.php?id=$id';</script>");
													  
													  }
												}
											}
										?>
									</div>
								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Big Wing Sneakers (Navy)</h6>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							   <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
			<div class="w3_agile_latest_arrivals">
			<h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>	
					 
                     
			<?php
                               $sql5="SELECT * FROM tbn_product where product_category_id=$typeProduct order by id DESC limit 4";
							   $res5=mysqli_query($conn,$sql5);
							   if($res5==true){
								   $count5=mysqli_num_rows($res5);
								   if($count5>0){
									   while($row5=mysqli_fetch_assoc($res5)){
										   $id5=$row5['id'];
										   $name5=$row5['name'];
										   $price5= $row5['price'];
										   $image5=$row5['image'];
										?>

							<div class="col-md-3 product-men single">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo SITEURL; ?>images/product/<?php echo$image5; ?>" alt="" class="pro-image-front">
										<img src="<?php echo SITEURL; ?>images/product/<?php echo$image5; ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="detail.php?id=<?php echo$id5; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="detail.php?id=<?php echo$id5; ?>"><?php echo $name5; ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">$<?php echo $price5; ?></span>
											<del>$189.71</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="" method="post">
																<fieldset>


																	<input type="hidden" name="idProduct" value="<?php echo $id5; ?>" />
																	<input type="hidden" name="add"  value="1" />
																	<input type="hidden" name="item_name" value="<?php echo $name5; ?>" />
																	<input type="hidden" name="amount" value="<?php echo $price5; ?>" />
																	<input type="hidden" name="discount_amount" value="" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="submit" name="addToCart" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
																			
									</div>
								</div>
							</div>

										<?php
									   }
								   }
							   }
                ?>
				

							<div class="clearfix"> </div>
					<!--//slider_owl-->
		         </div>
	        </div>
 </div>
<!--//single_page-->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span>E</span>lite Shoppy </a></h2>
			<p>Lorem ipsum quia dolor
			sit amet, consectetur, adipisci velit, sed quia non 
			numquam eius modi tempora.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
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
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Our <span>Information</span> </h4>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="mens.html">Men's Wear</a></li>
						<li><a href="womens.html">Women's wear</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="typography.html">Short Codes</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+1 234 567 8901</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Broome St, NY 10002,California, USA. 
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					<h4>Flickr <span>Posts</span></h4>
					<ul>
						<li><a href="single.html"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="agile_newsletter_footer">
					<div class="col-sm-6 newsleft">
				<h3>SIGN UP FOR NEWSLETTER !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="#" method="post">
					<input type="email" placeholder="Enter your email..." name="email" required="">
					<input type="submit" value="Submit">
				</form>
			</div>

		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy 2017 Elite shoppy. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
<!-- //footer -->

<script>
function myFunction() {
var quantityProduct = document.getElementById("country1").value;
document.getElementById("addQuantity").value = quantityProduct;
var quantityProduct2 = document.getElementById("addQuantity").value;

}
</script>




</body>
</html>
<?php
																if(isset($_POST['addToCart']))
																{
																	if($_SESSION['userH']=="")
																	{
																		$_SESSION['login']="<p class='card-description' style='color:green;'>You must Login </p>";
																		echo("<script>location.href = '".SITEURL."home/home.php';</script>");
																	}	
																	else
																	{
																		$idProduct=$_POST["idProduct"];
																		$priceProduct=$_POST["amount"];
																		$quantityProduct=$_POST["add"];
																		$userOfProduct=$_SESSION['userH'];
																		$date=date("Y-m-d H:i:s");

																		
																		
																		$sqlS="SELECT*from tbn_order where status='chose' and product_id=$idProduct and user_id=$userOfProduct";
																		$resS=mysqli_query($conn,$sqlS);
																		if($resS==true){
																			$countS=mysqli_num_rows($resS);
																			if($countS>0)
																			{
																				$rowS = mysqli_fetch_assoc($resS);
																				$slsp=$rowS["quantity"];
																				$slsp=$slsp+$quantityProduct;
																				$sql2="update  tbn_order set date='$date', quantity=$slsp where status='chose' and product_id=$idProduct and user_id=$userOfProduct";
																				$res2=mysqli_query($conn,$sql2);
																				 if($res2==true){
																				   $_SESSION['login']="<p class='card-description' style='color:green;'>Update to cart successfully</p>";
																		   
																				 }
																				 else{
																				   $_SESSION['login']="<p class='card-description' style='color:green;'>Failed to update to cart  </p>";			  
																				   echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
																				 }
																			}
																			else{
																				$sql2="INSERT INTO tbn_order set product_id=$idProduct,price=$priceProduct,
																				status='chose',date='$date', quantity=$quantityProduct,user_id=$userOfProduct";
																				 $res2=mysqli_query($conn,$sql2);
																				 if($res2==true){
																				   $_SESSION['login']="<p class='card-description' style='color:green;'>Add to cart successfully</p>";
																		   
																				 }
																				 else{
																				   $_SESSION['login']="<p class='card-description' style='color:green;'>Failed to Add to cart  </p>";			  
																				   echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
																				 }
																			}
																		}	

																	}
																}
 ?>
<?php include('./partials/js.php'); ?>