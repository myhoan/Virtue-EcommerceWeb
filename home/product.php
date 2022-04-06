
<?php include('./partials/menu.php'); ?>

<?php
    if(isset($_GET['id'])and isset($_GET["Cid"])){
        $Tid = $_GET['id'];
        $Cid=$_GET['Cid'];
        $sql="select * from tbn_category where id=$Cid";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count ==1)
        {
          $row = mysqli_fetch_assoc($res);
          $Cname = $row['name'];
          $image= $row['image'];
		  $sql5="SELECT * FROM tbn_product where product_category_id=$Tid and status='Yes' order by id DESC limit 3";
		  $sql6="SELECT * FROM tbn_product where product_category_id=$Tid and status='Yes'";
        }
        else{
          $_SESSION['add']="<p class='card-description'>Category not found</p>";
      echo("<script>location.href = '".SITEURL."home/home.php';</script>");
        }
    }
    else{

		if(isset($_GET['key']))
		{
			$keyword = $_GET['key'];
			$Cname=$keyword;
			$image="bottom3.jpg";
			$sql5="SELECT * FROM tbn_product where (name like '%$keyword%' and status='Yes') or (description like '%$keyword%' and status='Yes') order by id DESC limit 3";
			$sql6="SELECT * FROM tbn_product where (name like '%$keyword%' and status='Yes') or (description like '%$keyword%' and status='Yes')";
		}
		else
		{
			echo("<script>location.href = '".SITEURL."home/home.php';</script>");
		}
      
    }
?>

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><?php echo $Cname; ?>  </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li><?php echo $Cname; ?> </li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<!-- <div class="filter-price">
				<h3>Filter By <span>Price</span></h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
						</li>			
					</ul>
			</div> -->
			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
                    <?php 
                          $sql2 = "SELECT * FROM tbn_category";
                          $res2=mysqli_query($conn,$sql2);
                          if($res2==true){
                            $count2=mysqli_num_rows($res2);
                            $sn=0;
                            if($count2>0){
                                while($rows2=mysqli_fetch_assoc($res2)){
                                  $Cid2=$rows2['id'];
                                  $Cname2=$rows2['name'];

                                    ?>
                                    				<ul>
                                                        <li><input type="checkbox" id="item-0-<?php echo($sn); ?>" /><label for="item-0-<?php echo($sn++); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><?php echo $Cname2; ?></label>
                                                            <ul>      
                                                            <?php
                                                                $sql3="SELECT * FROM tbn_product_category where category_id=$Cid2";
                                                                $res3=mysqli_query($conn,$sql3);
                                                                if($res3==true)
                                                                {
                                                                    $count3=mysqli_num_rows($res3);
                                                                    if($count3>0)
                                                                    {
                                                                       while($r=mysqli_fetch_assoc($res3))
                                                                       {
                                                                        $id4=$r['id'];
                                                                        $name4=$r['name'];
                                                                        echo("<li><a href='product.php?id=$id4&Cid=$Cid2'>$name4</a></li>");

                                                                       }
                                                                    }
                                                                }
                                                                ?>    
                                                                                       
                                                            </ul>
                                                        </li>

                                                    </ul>
                                       
                                    <?php

                                }
                            }
                        }      

                    ?>
					

				</ul>
			</div>
			<div class="community-poll">
				<h4>Community Poll</h4>
				<div class="swit form">	
					<form>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>		
					<input type="submit" value="SEND">
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<!-- <h5>Product <span>Compare(0)</span></h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div> -->
			<div class="men-wear-top">
				
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="images/banner2.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="images/banner5.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="images/banner2.jpg" alt=" "/>
						</li>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="<?php echo SITEURL; ?>images/category/<?php echo$image; ?>" alt="" />
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4>Exclusive Men's <span>Collections</span></h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
					odit aut fugit. </p>
				</div>
				<div class="clearfix"></div>
			</div>


			<?php
                             
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

							<div class="col-md-4 product-men">	
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
										<h4><a href="detail.php?id=<?php echo$id5; ?>"><?php echo $name5;?></a></h4>
										<div class="info-product-price">
											<span class="item_price">$<?php echo $price5;?></span>
											<del>$390.71</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="" method="post">
																<fieldset>
																	<input type="hidden" name="idProduct" value="<?php echo $id5; ?>" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="item_name" value="<?php echo $name5; ?>" />
																	<input type="hidden" name="amount" value="<?php echo $price5; ?>" />
																	<input type="hidden" name="discount_amount" value="" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="submit" onclick="showToast();" name="addToCart" value="Add to cart" class="button" />
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
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
		<div class="single-pro">


                            <?php
                               
							   $res6=mysqli_query($conn,$sql6);
							   if($res6==true){
								   $count6=mysqli_num_rows($res6);
								   if($count6>0){
									   while($row6=mysqli_fetch_assoc($res6)){
										   $id6=$row6['id'];
										   $name6=$row6['name'];
										   $price6= $row6['price'];
										   $image6=$row6['image'];
										   ?>
			<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo SITEURL; ?>images/product/<?php echo$image6; ?>" alt="" class="pro-image-front">
										<img src="<?php echo SITEURL; ?>images/product/<?php echo$image6; ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="detail.php?id=<?php echo$id6; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>											
									</div>
									<div class="item-info-product ">
										<h4><a href="detail.php?id=<?php echo$id6; ?>"><?php echo $name6;?></a></h4>
										<div class="info-product-price">
											<span class="item_price">$<?php echo $price6;?></span>
											<del>$69.71</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="" method="post">
																<fieldset>
																	<input type="hidden" name="idProduct" value="<?php echo $id6; ?>" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="item_name" value="<?php echo $name6; ?>" />
																	<input type="hidden" name="amount" value="<?php echo $price6; ?>" />
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

							<div class="clearfix"></div>
		</div>
	</div>
</div>	
<!-- //mens -->
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


<!-- js -->
<!-- //js -->

	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->

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
