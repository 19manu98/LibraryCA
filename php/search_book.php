<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  //if the fields are empty display all the books
  if(empty($_POST['Author'])){
    $Author="%";
  }
  else{
    $Author=$_POST['Author'];
  }

  if(empty($_POST['Book'])){
    $Book="%";
  }
  else{
    $Book=$_POST['Book'];
  }

  $genre=$_POST['genre'];

  header('Location: display.php?page=1&Author=' .$Author . '&book=' . $Book . '&genre=' . $genre);

}
