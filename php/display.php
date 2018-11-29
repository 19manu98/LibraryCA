<?php
//if the user is not log in, he is not allowed to access this page
session_start();
if (!isset($_SESSION['user'])) {
header('Location: ../index.php');
}
?>
<html>
<head>
  <title> My library account</title>
  <link rel="stylesheet" type="text/css" href="../css/stylemy.css">
  <?php include 'connection.php';?>
</head>
<body>
  <div id='main'>
    <h1>Welcome to you library page</h1>
    <ul>
      <li><a class="active" href="mylibrary.php">Search</a></li>
      <li><a href="myreservation.php">Your reservation</a></li>
      <li><a href="mydetails.php">Your details</a></li>
      <li style="float:right"><a  href="logout.php">Log Out</a></li>
    </ul>

    <form class="search" action="search_book.php" method="POST">
      <div class="field-wrap">
        <label>
          Author Name
        </label>
        <input type="text" name="Author" placeholder="Enter Author"?/>
      </div>

      <div class="field-wrap">
        <label>
          Book Name
        </label>
        <input type="text" name="Book" placeholder="Enter Book" />
      </div>

      <div class="field-wrap">
        <label>
          Genre
        </label>
        <select name="genre" id="genre">
          <option value="%" > Any </option>
          <?php
            $result = mysqli_query($con,"SELECT * FROM Category");
            while($row=mysqli_fetch_array($result)){
              echo $row['CategoryDescription'];
              echo "<option value='" . $row['CategoryId'] . "'>".$row['CategoryDescription'] . "</option>";
            }
           ?>
        </select>
      </div>
      <button type="submit" class="searchButton">
        Search
     </button>
   </form>
   <?php
         include 'connection.php';
         $Author=$_GET['Author'];
         $Book=$_GET['book'];
         $genre=$_GET['genre'];

         if ($_GET['page'] == '1'){
               $page=0;
         }
         else{
             $page=$_GET['page'];
             $page=($page*5)-5;
         }


         $count= mysqli_query($con, "SELECT count(*) AS 'count' FROM `Book` where `BookTitle` like '% " . $Book ."%' and `Author` like '%" . $Author . "%' and `Category` like '%" . $genre ."%'");
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
          <th>Reserved</th>";

          $sql="SELECT * FROM `Book` left outer join `Category` on `Category`= `CategoryId`  where `BookTitle` like '% " . $Book ."%' and `Author` like '%" . $Author . "%' and `Category` like '%" . $genre ."%' limit 5 offset " . $page ;
          $result = mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" .$row['ISBN']."</td>";
            echo "<td>" .$row['BookTitle']."</td>";
            echo "<td>" .$row['Author']."</td>";
            echo "<td>" .$row['Edition']."</td>";
            echo "<td>" .$row['Year']."</td>";
            echo "<td>" .$row['CategoryDescription']."</td>";
            if ($row['Reserved'] == 'N'){
              echo "<td><a href='reserve.php?id=" .$row['ISBN']. "'>RESERVE</a></td>";
            }
            else{
              echo "<td><a href='' onclick='alert(\"Book alredy reserved!\");'>RESERVED</a></td>";
            }
            echo "</tr>";
          }
          echo "<br>";
          echo "<div class='link'>";
          for($currpage=1;$currpage<=$totpage;$currpage++){
            echo "<a class='page' href='display.php?page=" . $currpage . "&Author=" .$Author . "&book=" . $Book . "&genre="  . $genre . "' style='text-decoration:none'>" .$currpage . " </a>";
          }
          echo "</div>";
       }

     ?>


  </div>
</body>
</html>
