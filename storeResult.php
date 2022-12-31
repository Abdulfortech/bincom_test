<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Abdullahi Aminu">
  <meta name="twitter handle" content="Abdulfortech">
  <title>BINCOM TEST | Store Result</title>
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
        $id = $_POST['lga'];
      }else{ echo "<script> window.open('index', '_self')</script>"; }
    ?>
    <div class="py-5 mt-5">
      <center>
        <!-- single -->
          <div class="col-md-6 p-3 border rounded">
              <form method="POST" class="text-start" action="action.php">
                <h2 class="text-center my-4">Store Results of New Polling Unit for All Parties</h2>
                <input type="text" name="lga" value="<?=$id?>" hidden>
                <div class="form-group my-4">
                  <label>Select Polling Unit</label>
                    <select class="form-control" name="polling">
                      <option selected value="">Choose..</option>
                      <?php  $pu = $conn->query("SELECT * FROM polling_unit WHERE lga_id = '".$id."' ") or die($conn->error);
                          while ($row = $pu->fetch_assoc()) {?>
                            <option value="<?= $row['uniqueid'];?>"><?= $row['polling_unit_name'];?></option>
                      <?php   }?>
                    </select>
                </div>
                <div class="form-group my-4">
                  <label>Party Abbreviation</label>
                  <input type="text" name="party"  class="form-control" required>
                </div>
                <div class="form-group my-4">
                  <label>Party Score</label>
                  <input type="text" name="score"  class="form-control" required>
                </div>
                <div class="form-group my-4">
                  <label>User</label>
                  <input type="text" name="user" value="Abdul" class="form-control" required>
                </div>
                <div class="form-group my-4">
                  <label>IP Address</label>
                  <input type="text" name="ip"  class="form-control" value="192.168.1.101" required>
                </div>
                <center>
                  <input type="submit" class="btn btn-info" name="submit" value="Submit">
                </center>
              </form>
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