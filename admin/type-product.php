<?php include('./partials/menu.php'); ?>
<?php

  if(isset($_GET['key']))
  {
    $keyword = $_GET['key'];
    $sql = "SELECT * FROM tbn_product_category where name like '%$keyword%'";
  }
  else
  {
    $sql = "SELECT * FROM tbn_product_category";
  }

?>

<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Category Table</h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="keyword" placeholder="Search Here" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" name="search" value="search" type="summit">Search</button>
                        
                      </div>
                    </div>
                  </div>
                  </form>
                  <?php
                    if(isset($_POST['search']))
                    {
                      $keyword = $_POST['keyword'];
                     
                       echo("<script>location.href = '".SITEURL."admin/type-product.php?key=$keyword';</script>");
                    }
                  ?>
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
                    <a class="btn btn-primary" href="add-type-product.php">Insert</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <!-- <th>Category</th> -->
                          <th>image</th>
                          
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                          
                          $res=mysqli_query($conn,$sql);
                          if($res==true){
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                  $id=$rows['id'];
                                  $name=$rows['name'];
                                  $category_id=$rows['category_id'];
                                  $image=$rows['image'];                               
                                  ?>


                                    <tr>
                                      <td><?php echo $sn++; ?></td>
                                      <td><?php echo $name; ?></td>
                                      <!-- <td>
                                      <?php 
                                        $sql2="select * from tbn_category where id=$category_id";
                                        $res2=mysqli_query($conn,$sql2);
                                        $rows2=mysqli_fetch_assoc($res2);
                                        $nameCategory=$rows2['name'];
                                        echo $nameCategory;

                                       ?>
                                      </td> -->
                                      <td> 
                                       <?php 

                                        if($image!="")
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/type-product/<?php echo$image; ?>" style="border-radius:0;width:120px;height:100%;" alt="">
                                            <?php

                                        }else{
                                            echo"<div> Image not Added";
                                        }

                                       ?>
                                      
                                      </td>
                                      
                                      <td style="display:flex;   justify-content: space-evenly;">
                                        <a href="<?php echo SITEURL; ?>admin/update-type-product.php?id=<?php echo $id; ?>" class="badge badge-success" style="cursor:pointer;  text-decoration: none;">Update</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-type-product.php?id=<?php echo $id; ?>&image=<?php echo $image;  ?>"style="cursor:pointer;  text-decoration: none;" class="badge badge-danger">Delete</a>
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