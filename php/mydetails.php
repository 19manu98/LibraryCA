<?php
//if the user is not log in, he is not allowed to access this page
session_start();
if (!isset($_SESSION['user'])) {
header('Location: ../index.php');
}
?>
<html>
<head>
  <title> My library details</title>
  <link rel="stylesheet" type="text/css" href="../css/stylemy.css">
</head>
<body>
  <div id='main'>
    <h1>Your library details</h1>
    <ul>
      <li><a href="search.php">Search</a></li>
      <li><a href="myreservation.php?page=1">Your reservation</a></li>
      <li><a class="active" href="mydetails.php">Your details</a></li>
      <li style="float:right"><a  href="logout.php">Log Out</a></li>
    </ul>

  </div>
</body>
</html>
