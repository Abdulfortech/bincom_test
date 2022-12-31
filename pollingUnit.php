<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Abdullahi Aminu">
  <meta name="twitter handle" content="Abdulfortech">
  <title>BINCOM TEST | Home</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
  <!-- Bootstrap core CSS -->
  <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
  <!-- fontawesome -->
  <link href="vendor/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="">
  <main class="container">
    <?php include 'navbar.php';
      if($_POST){
        $id = $_POST['polling'];
      }else{ echo "<script> window.open('index', '_self')</script>"; }
      $pu = $conn->query("SELECT * FROM polling_unit WHERE uniqueid = '".$id."'  ");
      while ($row = $pu->fetch_assoc()) {
        $pname = $row['polling_unit_name'];
      }
      $result = $conn->query("SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid = '".$id."'  ");
          ?>
    <div class="py-5">
      <center>
        <div class="col-md-7">              
            <div class="container text-center mt-5 page-card">
                <h1 class="featurette-heading fw-bold mt-4 mb-5 text-info"><?= $pname?> Results</span></h1>
                <div class="card ">
                    <div class="card-body text-start">
                        <div class="row mt-4">
                          <?php
                            $totalResult =0;
                            while ($row = $result->fetch_assoc()) {
                              $totalResult += $row['party_score'];
                          ?>
                            <div class="col-md-12">
                              <ol class="breadcrumb border rounded">
                                <li class="breadcrumb-item p-2">
                                  <b> Party : </b> <?= $row['party_abbreviation']; ?> <b> Score : </b>  <?= $row['party_score']; ?> <b> Date : </b> <?= $row['date_entered']; ?>
                                </li>
                              </ol>
                            </div>
                          <?php }?>
                          The Total Result for <?= $pname?> : <?= number_format($totalResult,0)?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php" class="btn btn-info my-3" >Back to Home Page</a>
      </center>
    </div>
  </main>

<!--Footer-->

<!--Footer-->
    <?php include 'footer.php';?>
<!--/.Footer-->


<!-- Bootstrap -->
<script src="vendor/js/bootstrap.bundle.min.js"></script> 
<script src="vendor/js/bootstrap.min.js"></script>  

  </body>
</html>