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
      <li><a href="myreservation.php?page=1">Your reservation</a></li>
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



  </div>
</body>
</html>
