<?php
require 'connection.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['date']) && isset($_GET['lat'])  && isset($_GET['lon'])  ) {
$closestDate = $_GET['date'];
$lat=$_GET['lat'];
$lon=$_GET['lon'];
$msg="Closest Date";
}
else
{

  $sql = "SELECT * FROM tbl_gps WHERE id = (SELECT MAX(id) FROM tbl_gps);";
  $result = $conn->query($sql);

      if ($result->num_rows > 0) 
      {
          $row = $result->fetch_assoc();
          $closestDate = $row['created_date'];
          $lat=$row['lat'];
          $lon=$row['lng'];
          
          $msg="Last update";
      }
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Home</title>
    
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
            <a class="nav-link active" href="home.php">HOME</a>
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

      <h5>&nbsp&nbsp&nbsp&nbsp <?php echo $msg." : ".$closestDate ?></h5>
      <section class="section">
        <div class="shell-wide">
          <div class="range range-30 range-xs-center">
            <div class="cell-lg-8 cell-xl-6">
      
                
                    
                    
                <div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
                  <iframe src="https://maps.google.com/maps?q=<?php echo $lat; ?>,<?php echo $lon; ?>&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;"></iframe>
                </div>
                
              
            </div>
            <div class="cell-lg-4 cell-xl-6 reveal-lg-flex">
              <div class="hotel-booking-form">
                <h3>Search</h3>
                <!-- RD Mailform-->
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="search.php">
                  <div class="range range-sm-bottom spacing-20">
                    
                   
                    <div class="cell-lg-12 cell-md-4 cell-sm-6">
                      <p class="text-uppercase">Date</p>
                      <div class="form-wrap">
                        <input class="form-input"  type="date" name="date" value="<?php echo date('Y-m-d'); ?>" data-constraints="@Required">
                      </div>
                    </div>
                    <div class="cell-lg-12 cell-md-4 cell-sm-6">
                      <p class="text-uppercase">Time</p>
                      <div class="form-wrap form-wrap-validation">
                        <!--
                        <input class="form-input" type="time" name="time" value="22:00" />-->
                        <input class="form-input"   type="time" name="time" value="<?php echo date('H:i'); ?>" data-constraints="@Required">
                      </div>
                    </div>
          

                    <div class="cell-lg-12 cell-md-4">
                      <button class="button button-primary button-square button-block button-effect-ujarak" type="submit"><span>check availability</span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
           
          </div>
        </div>
      </section>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<?php
  if(isset($_GET['msg']))
  {
    $msg=$_GET['msg'];
    echo  "<script> alert('$msg'); </script>";
  }
?>

    </body>
</html>