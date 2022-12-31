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
        $id = $_POST['lga'];
      }else{ echo "<script> window.open('index', '_self')</script>"; }
      $lga = $conn->query("SELECT * FROM lga WHERE uniqueid = '".$id."'  ");
      while ($row = $lga->fetch_assoc()) {
        $lgaid = $row['lga_id'];
        $stateid = $row['state_id'];
        $lganame = $row['lga_name'];
        $lgadesc = $row['lga_description'];
        $user = $row['entered_by_user'];
      }
    ?>
    <div class="py-5">
      <center>
        <div class="col-md-8">              
            <div class="container text-center mt-5 page-card">
                <h1 class="featurette-heading fw-bold mt-4 mb-5 text-info"><?= $lganame?> Summed Total Result of All Its Polling Units</span></h1>
                <table id="example1" class="table table-bordered table-striped text-start">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Polling Unit</th>
                                <th>Political Party</th>
                                <th>Party Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $count = 1;
                              $query = $conn->query("SELECT polling_unit.uniqueid, polling_unit.lga_id, polling_unit.polling_unit_name, announced_pu_results.polling_unit_uniqueid, announced_pu_results.party_abbreviation, SUM(announced_pu_results.party_score) AS totalResult FROM polling_unit LEFT JOIN announced_pu_results ON polling_unit.uniqueid=announced_pu_results.polling_unit_uniqueid WHERE polling_unit.lga_id= ".$id." GROUP BY announced_pu_results.party_abbreviation ");
                              $totalResult =0;
                              foreach($query as $info){
                                $totalResult += $info['totalResult'];
                            ?>
                            <tr>
                                <td><?= $count; ?></td>
                                <td><?= $info['polling_unit_name'];?></td>
                                <td><?= $info['party_abbreviation']?></td>
                                <td><?= $info['totalResult']?></td>
                            </tr>
                            <?php $count++;}?>
                        </tbody>
                    </table>
                    <h5 class="text-center text-info fw-bold">The Summed Total Result for this LGA is <?= number_format($totalResult,0)?></h5>
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