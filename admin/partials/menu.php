<?php 
  
  include('../config/constants.php'); 
  include('login-check.php');
?>
  
<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>VIRTUE MARKET</title> 
  <!-- plugins:css -->
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
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>


  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="../images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?php   echo $_SESSION['user'];?>  </span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="notificationDropdown" href="../#" data-bs-toggle="dropdown">
              <i class="icon-mail icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-alert m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                  <p class="fw-light small-text mb-0"> Just now </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-settings m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                  <p class="fw-light small-text mb-0"> Private message </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-airballoon m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                  <p class="fw-light small-text mb-0"> 2 days ago </p>
                </div>
              </a>
            </div>
          </li>

          <?php
            $sqlA="select * from tbn_account where typeaccount_id=33";
            $resA=mysqli_query($conn,$sqlA);
            $countA=mysqli_num_rows($resA);

            $sqlP="select * from tbn_product where status='Waiting'";
            $resP=mysqli_query($conn,$sqlP);
            $countP=mysqli_num_rows($resP);
          ?>

          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="../#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <?php
                if($countA>0 or $countP>0)
                {
                  echo(" <span class='count'></span>");
                }
              ?>
             
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have <?php echo($countA+$countP) ?> notices</p>
                <!-- <span class="badge badge-pill badge-primary float-right">View all</span> -->
              </a>
              <div class="dropdown-divider"></div>
              <?php 
                if($countA>0)
                {
                  while($rowsA=mysqli_fetch_assoc($resA))
                  {
                    $idA = $rowsA['id'];
                    $nameA=$rowsA['name'];

                    ?>
                    <a  href="<?php echo SITEURL; ?>admin/update-account.php?id=<?php echo $idA; ?>" class="dropdown-item preview-item">
                      <!-- <div class="preview-thumbnail">
                        <img src="../images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                      </div> -->
                      <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $nameA; ?></p> </p>
                        <p class="fw-light small-text mb-0"> <?php echo $nameA; ?> wants to become seller </p>
                      </div>
                    </a>
                    <?php
                  }
                }
              ?>
              <?php 
                if($countP>0)
                {
                  while($rowsP=mysqli_fetch_assoc($resP))
                  {
                    $idP = $rowsP['id'];
                    $nameP=$rowsP['name'];
                    $idVendor=$rowsP['vendor_id'];
                    $imageP=$rowsP['image'];
                    ?>
                    <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $idP; ?>" class="dropdown-item preview-item">
                      
                      <div class="preview-item-content flex-grow py-2">
                        <?php 
                          $sqlU="select * from tbn_account where id=$idVendor";
                          $resU=mysqli_query($conn,$sqlU);
                          $countU=mysqli_num_rows($resU);
                          if($countU>0)
                          {
                            $rowsU=mysqli_fetch_assoc($resU);
                            $nameUser=$rowsU['name'];
                          }
                        ?>
                        <p class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $nameUser; ?> </p> </p>
                        <p class="fw-light small-text mb-0"> want to sell <?php echo $nameP; ?> </p>
                      </div>
                      <div class="preview-thumbnail">
                        <img src="<?php echo SITEURL; ?>images/product/<?php echo$imageP; ?>" alt="image" class="img-sm profile-pic">
                      </div>
                    </a>
                    <?php
                  }
                }
              ?>


            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="../#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="../images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
              <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
 
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Analysis Revenue</span>
            </a>
          </li>

          <li class="nav-item nav-category">Forms and Datas</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="../#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <!-- <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="type-account.php">TYPE ACCOUNT</a></li>
                </ul>
                </div> -->
                <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="account.php">ACCOUNT</a></li>
                </ul>
                </div>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="user.php">ORDER</a></li>
                    </ul>
                </div>
                <!-- <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="category.php">CATEGORY</a></li>
                    </ul>
                </div> -->
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="type-product.php">PRODUCT CATEGORY</a></li>
                    </ul>
                </div>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="product.php">PRODUCT</a></li>
                    </ul>
                </div>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="comment.php">COMMENT</a></li>
                    </ul>
                </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
