<?php include('./partials/menu.php'); ?>

<div class="col-lg-6 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Type Account Table</h4>
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
                    ?>
                    <a class="btn btn-primary" href="add-typeaccount.php">Add Type Account</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                          <?php
                              $sql = "SELECT * FROM tbn_typeaccount";
                              $res=mysqli_query($conn,$sql);
                              if($res==true){
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                    while($rows=mysqli_fetch_assoc($res)){
                                      $id=$rows['id'];
                                      $name=$rows['name'];

                                      ?>


                                        <tr>
                                          <td><?php echo $sn++; ?></td>
                                          <td><?php echo $name; ?></td>
                                          <td style="display:flex;   justify-content: space-evenly;">
                                            <a href="<?php echo SITEURL; ?>admin/update-typeaccount.php?id=<?php echo $id; ?> " class="badge badge-success" style="cursor:pointer;  text-decoration: none;">Update</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-typeaccount.php?id=<?php echo $id; ?>" class="badge badge-danger" style="cursor:pointer;  text-decoration: none;">Delete</a>
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