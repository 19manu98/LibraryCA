<?php
  //if the user is not log in, he is not allowed to access this page
  session_start();
  if (!isset($_SESSION['user'])) {
  header('Location: ../index.php');
  }
  include 'connection.php';
  $ISBN = $_GET['id'];

  $sql="UPDATE Book SET Reserved='Y' where ISBN = '" . $ISBN ."';";
  $sql1="INSERT INTO Reservation (ISBN,Username,ReservedData) VALUES ('" . $ISBN . "','" . $_SESSION['user'] . "',CURRENT_DATE());";
  $result = mysqli_query($con,$sql);
  $result = mysqli_query($con,$sql1);

  echo "<script type='text/javascript'>alert('Booked compleated');
  window.location.href='search.php';</script>";


 ?>
