<?php
//if the user is not log in, he is not allowed to access this page
session_start();
if (!isset($_SESSION['user'])) {
header('Location: ../index.php');
}
?>
<html>
<head>
  <title> My library reservation</title>
  <link rel="stylesheet" type="text/css" href="../css/stylemy.css">
</head>
<body>
  <div id='main'>
    <h1>Welcome to your reservation</h1>
    <ul>
      <li><a href="search.php">Search</a></li>
      <li><a class="active" href="myreservation.php?page=1">Your reservation</a></li>
      <li><a href="mydetails.php">Your details</a></li>
      <li style="float:right"><a  href="logout.php">Log Out</a></li>
    </ul>
    <?php
    include 'connection.php';
    if ($_GET['page'] == '1'){
          $page=0;
    }
    else{
        $page=$_GET['page'];
        $page=($page*5)-5;
    }


    $count= mysqli_query($con, "SELECT count(*) AS 'count' FROM Reservation WHERE Username like '" . $_SESSION['user'] . "'");
    $row = mysqli_fetch_assoc($count);
    $totele= $row['count'];
    $totpage=ceil($totele/5);

   if ($totele == 0){
     echo "<script type='text/javascript'>alert('Not elements founded');</script>";
   }
   else{
     echo "<table class='books'>
     <tr>
     <th>ISBN</th>
     <th>Book Title</th>
     <th>Author</th>
     <th>Edition</th>
     <th>Year</th>
     <th>Category</th>
     <th>Reserved Date</th>
     <th>Return</th>";

     $sql=("SELECT Book.ISBN,Book.BookTitle,Book.Author,Book.Edition,Book.Year,Category.CategoryDescription,Reservation.ReservedData,Reservation.ReservedId FROM Book JOIN Reservation on Book.ISBN=Reservation.ISBN join Category on Category.CategoryId=Book.Category WHERE Username like '" . $_SESSION['user']. "' limit 5 offset " . $page ) ;
     $result = mysqli_query($con,$sql);
     while($row=mysqli_fetch_array($result)){
       echo "<tr>";
       echo "<td>" .$row['ISBN']."</td>";
       echo "<td>" .$row['BookTitle']."</td>";
       echo "<td>" .$row['Author']."</td>";
       echo "<td>" .$row['Edition']."</td>";
       echo "<td>" .$row['Year']."</td>";
       echo "<td>" .$row['CategoryDescription']."</td>";
       echo "<td>" .$row['ReservedData']."</td>";
       echo "<td><a href='return.php?id=" .$row['ReservedId']. "'>return</a></td>";
       echo "</tr>";
     }
     echo "<br>";
     echo "<div class='link'>";
     for($currpage=1;$currpage<=$totpage;$currpage++){
       echo "<a class='page' href='myreservation.php?page=" . $currpage . "' style='text-decoration:none'>" .$currpage . " </a>";
     }
     echo "</div>";
   }

   ?>
  </div>
</body>
</html>
