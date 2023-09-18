<?php
require 'connection.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
}

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
$error1 = isset($_GET['error1']) ? $_GET['error1'] : '';

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Edit</title>
    
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/delivery.png"/>
    <!-- Stylesheets-->
    
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  </head>

  <body>
    <!--HEADER-->
  <header class="py-4 text-center">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="home.php"><img src="images/delivery.png" alt="logo" width="25" height="25"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item  ms-4">
            <a class="nav-link " href="home.php">HOME</a>
          </li>
          <li class="nav-item  ms-4">
            <a class="nav-link " href="alldate.php">ALL DATA</a>
          </li>
          </ul>
      </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="images/patient.png" alt="logo" width="20" height="20">
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="edit.php"><i class="fas fa-edit"></i> Edit</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
         </div>
    </div>
  </nav>
  <hr style="width:90%; margin: auto;" />
</header>

<section class="section">
  <div class="shell-wide">
    <div class="range range-30 range-xs-center">
      <div class="cell-lg-8 cell-xl-5 reveal-lg-flex">
        <div class="hotel-booking-form">
          <h3>Edit Username and Password:</h3>
          <!-- RD Mailform -->
          <form class="login100-form validate-form" name="form" action="editDo.php" onsubmit="return isvalid()" method="POST">
            <div class="range range-sm-bottom spacing-20">
              <div class="cell-lg-6">
                <div class="form-wrap form-wrap-validation">
                  <p class="text-uppercase">Current Username</p>
                  <input class="form-input" type="text" name="user" data-constraints="@Required">
                </div>
                <div class="form-wrap form-wrap-validation">
                  <p class="text-uppercase">New Username</p>
                  <input class="form-input" type="text" name="Nuser" data-constraints="@Required">
                </div>
              </div>
              <div class="cell-lg-6">
                <div class="form-wrap form-wrap-validation">
                  <p class="text-uppercase">Current Password</p>
                  <input class="form-input" type="password" name="pass" data-constraints="@Required">
                </div>
                <div class="form-wrap form-wrap-validation">
                  <p class="text-uppercase">New Password</p>
                  <input class="form-input" type="password" name="Npass" data-constraints="@Required">
                </div>
              </div>
              <div class="cell-lg-12 cell-md-4">
                <button class="button button-primary button-square button-block button-effect-ujarak" type="submit"><span>Change</span></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  function isvalid() {
  var user = document.form.user.value;
  var Nuser = document.form.Nuser.value;
  var pass = document.form.pass.value;
  var Npass = document.form.Npass.value;

  if (user.length === 0 && pass.length === 0) {
    alert("Username and password fields are empty!");
    return false;
  }
  else if (user.length === 0) {
    alert("Username field is empty!");
    return false;
  }
  else if (pass.length === 0) {
    alert("Password field is empty!");
    return false;
  }
  else if (Nuser.length === 0 && Npass.length === 0) {
    alert("New username and new password fields are empty!");
    return false;
  }
  else if (Nuser.length === 0) {
    alert("New username field is empty!");
    return false;
  }
  else if (Npass.length === 0) {
    alert("New password field is empty!");
    return false;
  }
 
}
  </script>  

<?php if (!empty($msg)) { ?>
  <script>alert('<?php echo $msg; ?>');</script>
<?php } ?>

<?php if (!empty($error)) { ?>
  <script>alert('<?php echo $error; ?>');</script>
<?php } ?>

<?php if (!empty($error1)) { ?>
  <script>alert('<?php echo $error1; ?>');</script>
<?php } ?>


 

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>

 </body>
</html>