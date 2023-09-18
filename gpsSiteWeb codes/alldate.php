<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
}
require 'connection.php';

$sql = "SELECT * FROM tbl_gps WHERE 1";
$result = $conn->query($sql);
if (!$result) {
  echo "Error: " . $sql . "<br>" . $db->error;
}
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<html lang="en">
  <head>
    <!-- Site Title-->
    <title>All data</title>
    
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
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="home.php"><img src="images/delivery.png" alt="logo" width="25" height="25"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center"  id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item  ms-4">
            <a class="nav-link" href="home.php">HOME</a>
          </li>
          <li class="nav-item  ms-4">
            <a class="nav-link active" href="alldate.php">ALL DATA</a>
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

<br> <br>
 <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
          <table id="myTable" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Date & Time</th>
                      <th>Google maps Link</th>
                      <!-- Add more columns if needed -->
                  </tr>
              </thead>
              <tbody>
              <?php foreach ($rows as $location) { ?>
                          <tr>
                              <td><?php echo $location['id']; ?></td>
                              <td><?php echo $location['lat']; ?></td>
                              <td><?php echo $location['lng']; ?></td>
                              <td><?php echo $location['created_date']; ?></td>
                              <td><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">View Location on google maps <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                          </tr>
                      <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
  


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>

      
</body>
</html>

