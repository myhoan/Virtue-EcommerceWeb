<?php include('./partials/menu.php'); ?>
<?php

  if(isset($_GET['key']))
  {
    $keyword = $_GET['key'];
    $sql = "SELECT * FROM tbn_comment where (product_id in (select id from tbn_product where name like '%$keyword%')) or (account_id in (select id from tbn_account where name like '%$keyword%')) ;";
  }
  else
  {
    $sql = "SELECT * FROM tbn_comment";
  }

?>

<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> COMMENT Table</h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="keyword" placeholder="Search Here" aria-label="Recipient's name">
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
                     
                       echo("<script>location.href = '".SITEURL."admin/comment.php?key=$keyword';</script>");
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

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name Product</th>
                          <th>ID Customer</th>
                          <th>Name Customer</th> 
                          <th>Comment</th> 
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
                                  $description=$rows['description'];
                                  $account_id=$rows['account_id'];
                                  $product_id=$rows['product_id'];                           
                                  ?>


                                    <tr>
                                      <td><?php echo $sn++; ?></td>
                                      <?php
                                        $sql1 = "SELECT * FROM tbn_product where id=$product_id";
                                        $res1=mysqli_query($conn,$sql1);
                                        $rows1=mysqli_fetch_assoc($res1);
                                        $nameP=$rows1['name'];

                                      ?>
                                      <td><?php echo $nameP; ?></td>
                                      <?php
                                        $sql2 = "SELECT * FROM tbn_account where id=$account_id";
                                        $res2=mysqli_query($conn,$sql2);
                                        $rows2=mysqli_fetch_assoc($res2);
                                        $nameA=$rows2['name'];
                                        

                                      ?>
                                      <td><?php echo  $account_id; ?></td>
                                      <td><?php echo $nameA; ?></td>
                                      <td><?php echo $description; ?></td>
                                      <td style="display:flex;   justify-content: space-evenly;">
                                      <form action="" method="POST" enctype="multipart/form-data">
                                      <input type="hidden" name="idComment" value="<?php echo $id; ?>" />
                                      <input  class=" badge-danger" name="deleteComment" type='submit' value="Delete" style=" cursor:pointer;text-decoration: none;display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: bold;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 10px;"/>      
                                      </form>
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

<?php

if(isset($_POST['deleteComment']))
{
    $idComment = $_POST['idComment'];

    $sql3="delete from tbn_comment where id=$idComment";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['delete']="<p class='card-description'>Delete Comment Successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/comment.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description'>Failed To Delete Coment </p>";
        echo("<script>location.href = '".SITEURL."admin/comment.php';</script>");
    }

}

   

?>