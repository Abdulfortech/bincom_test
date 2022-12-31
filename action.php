<?php 
  include 'connection.php';

session_start();

  if(isset($_POST['submit'])){
  $poll = $_POST['polling'];
  $party = $_POST['party'];
  $score = $_POST['score'];
  $user = $_POST['user'];
  $ip = $_POST['ip'];
  $date = date('Y-m-d');
  $query = $conn->query("INSERT INTO announced_pu_results (polling_unit_uniqueid, party_abbreviation, party_score, entered_by_user, date_entered, user_ip_address) 
    VALUE('$poll', '$party', '$score', '$user', '$date', '$ip')") OR die($conn->error);
    $_SESSION['msg'] = 'The data has been stored.';
    echo "<script> window.open('index.php', '_self')</script>";
}
?>