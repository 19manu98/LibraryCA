<?php
  //display nothing at the beggining
  $lUsername="";
  $lUsernameErr=$lpswErr="";
  $LogginError="";
  $error=0;
  //check if form is completed
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //if the register button is pressed
    if(!empty($_POST['Loggin'])){

      //show the register page in case of errors
      $log='showlog()';

      //if First Name is missing
      if(empty($_POST["lUsername"])){
        $lUsernameErr="Missing";
        $error=1;
      }
      else {
        $lUsername=$_POST["lUsername"];
      }

      //if password is missing
      if(empty($_POST["lpsw"])){
        $lpswErr="Missing";
        $error=1;
      }
      else {
        //if password not long 6
        if (strlen($_POST["lpsw"])!=6){
          $lpswErr="Must be 6 characters long";
          $error=1;
        }
      }

      if ($error==0){
        //conect to database
        include 'php/connection.php';

        //check if username already exists
        $sql = "SELECT * FROM `User` WHERE `Username` = '$lUsername' ";
        $result = mysqli_query($con,$sql);

        //if there is an error
        if (!$result) {
          echo "<script type='text/javascript'>alert('Database Error Occured')</script>";
        }

        //if userneme not in database
        if (mysqli_num_rows($result) == 0){
          $LogginError="Username not register";
        }
        else{
          $lpsw=$_POST["lpsw"];
          echo $lpsw;
          //check if username used the wrong password
          $row=mysqli_fetch_array($result);
          $hashed_password=$row['Password'];
          if(password_verify($lpsw,$hashed_password)){
            session_start();
            $_SESSION['user']= $lUsername;
            header("Location:php/search.php");
          }
          else{
            $LogginError=" incorrect password";
          }
        }

      }
    }
  }

?>
