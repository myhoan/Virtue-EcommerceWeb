<?php include('./partials/menu.php'); ?>

                <?php 
                     if(isset($_SESSION['login']))
                     {
                       echo $_SESSION['login'];
                       unset($_SESSION['login']);
                     }
                ?>
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="../#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="../#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="../#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="../#more" role="tab" aria-selected="false">More</a>
                    </li> -->
                  </ul>
                  <?php
                    $sql1="select count(*) as total from tbn_product ";
                    $res1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($res1);
                    $total1=$row1['total'];
                    
                    $sql2="select sum(quantity) as total from tbn_order where status ='received'";
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    $total2=$row2['total'];

                    $sql3="select product_id,sum(quantity) from tbn_order where status!='chose' GROUP BY product_id ORDER by sum(quantity) DESC;";
                    $res3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($res3);
                    $total3=$row3['product_id'];

                    $sql4="select * from tbn_product where id=$total3";
                    $res4=mysqli_query($conn,$sql4);
                    $row4=mysqli_fetch_assoc($res4);
                    $total4=$row4['name'];
                    
                    

                  ?>
                  <div>
                    <div class="btn-wrapper">
                      <a href="../#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="../#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="../#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Total Products</p>
                            <h3 class="rate-percentage"><?php echo  $total1; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+8</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">Products Sold</p>
                            <h3 class="rate-percentage"><?php echo  $total2; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">Best Sellers</p>
                            <h3 class="rate-percentage"><?php echo  $total4; ?>(<?php echo  $total3; ?>)</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+3%</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> -->
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> -->
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>


<?php include('./partials/footer.php'); ?>