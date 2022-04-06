<?php include('./partials/menu.php'); ?>


<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Table</h4>
                  <?php
                      if(isset($_SESSION['add']))
                      {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                      }
                      if(isset($_SESSION['delete']))
                      {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                      }
                      if(isset($_SESSION['update']))
                      {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                      }
                      if(isset($_SESSION['change']))
                      {
                        echo $_SESSION['change'];
                        unset($_SESSION['change']);
                      }
                      if(isset($_SESSION['upload']))
                      {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                      }
                  ?>
                    <a class="btn btn-primary" href="add-category.php">Add Category</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>image</th>
                          
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                          $sql = "SELECT * FROM tbn_category";
                          $res=mysqli_query($conn,$sql);
                          if($res==true){
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                  $id=$rows['id'];
                                  $name=$rows['name'];
                                  $image=$rows['image'];                               
                                  ?>


                                    <tr>
                                      <td><?php echo $sn++; ?></td>
                                      <td><?php echo $name; ?></td>
                                      <td> 
                                       <?php 

                                        if($image!="")
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo$image; ?>" style="border-radius:0;width:120px;height:100%;" alt="">
                                            <?php

                                        }else{
                                            echo"<div> Image not Added";
                                        }

                                       ?>
                                      
                                      </td>
                                      
                                      <td style="display:flex;   justify-content: space-evenly;">
                                    
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="badge badge-success" style="cursor:pointer;  text-decoration: none;">Update</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image=<?php echo $image;  ?>"style="cursor:pointer;  text-decoration: none;" class="badge badge-danger">Delete</a>
                                      </td>
                                    </tr>

                                  <?php
                                }
                            }
                          }
                        ?>



                       

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>




<?php include('./partials/footer.php'); ?>