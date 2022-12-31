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
    <?php include 'navbar.php';?>
    <div class="py-5">
      <div class="container py-4 mt-4">
        <div class="row mb-2 ">
          <!-- single -->
          <div class="col-md-4 border rounded p-2">
              <form method="POST" action="pollingUnit.php">
                <h2 class="text-center my-4">Display Result of Single Polling Unit</h2>
                <div class="form-group my-4">
                  <label>Select Polling Unit</label>
                    <select class="form-control" name="polling">
                      <option selected value="">Choose..</option>
                      <?php  $pu = $conn->query("SELECT * FROM polling_unit ") or die($conn->error);
                          while ($row = $pu->fetch_assoc()) {?>
                            <option value="<?= $row['uniqueid'];?>"><?= $row['polling_unit_name'];?></option>
                      <?php   }?>
                    </select>
                </div>
                <center>
                  <input type="submit" class="btn btn-info" name="viewPolling" value="Submit">
                </center>
              </form>
          </div>
          <!-- single -->
          <div class="col-md-4 border rounded p-2">
              <form method="POST" action="lga.php">
                <h2 class="text-center my-4">Display The Summed Total Result of All Polling Unit Under a Single LGA</h2>
                <div class="form-group my-4">
                  <label>Select Local Goverment</label>
                    <select class="form-control" name="lga">
                      <option selected value="">Choose..</option>
                      <?php  $lga = $conn->query("SELECT * FROM lga ") or die($conn->error);
                          while ($row = $lga->fetch_assoc()) {?>
                            <option value="<?= $row['uniqueid'];?>"><?= $row['lga_name'];?></option>
                      <?php   }?>
                    </select>
                </div>
                <center>
                  <input type="submit" class="btn btn-info" name="viewLGA" value="Submit">
                </center>
              </form>
          </div>
          <!-- single -->
          <div class="col-md-4 border rounded p-2">
              <form method="POST" action="storeResult.php">
                <h2 class="text-center my-4">Store Results of New Polling Unit for All Partes</h2>
                <div class="form-group my-4">
                  <label>Select Local Goverment</label>
                    <select class="form-control" name="lga">
                      <option selected value="">Choose..</option>
                      <?php  $lga = $conn->query("SELECT * FROM lga ") or die($conn->error);
                          while ($row = $lga->fetch_assoc()) {?>
                            <option value="<?= $row['uniqueid'];?>"><?= $row['lga_name'];?></option>
                      <?php   }?>
                    </select>
                </div>
                <center>
                  <input type="submit" class="btn btn-info" name="viewLGA" value="Submit">
                </center>
              </form>
          </div>
        </div>
      </div>
    <?php include 'footer.php';?>
    </div>
  </main>



<!-- Bootstrap -->
<script src="vendor/js/bootstrap.bundle.min.js"></script> 
<script src="vendor/js/bootstrap.min.js"></script>  
      
  </body>
</html>