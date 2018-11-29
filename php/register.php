<?php
  //display nothing at the beggining
  $fnameErr=$lnameErr=$addErr=$add2Err=$cityErr=$teleErr=$mobErr=$UsernameErr=$pswErr=$conpswErr="";
  $fname=$lname=$add2=$add=$city=$tele=$mob=$Username=$psw=$conpsw=$UsenameEx="";
  $log="";
  $error=0;
  //check if form is completed
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //if the register button is pressed
    if(!empty($_POST['Register'])){

        //show the register page in case of errors
        $log='showsig()';
        //if First Name is missing
        if(empty($_POST["fname"])){
          $fnameErr="Missing";
          $error=1;
        }
        else {
          $fname=$_POST["fname"];
        }

        //is lastname i missinf
        if(empty($_POST["lname"])){
          $lnameErr="Missing";
          $error=1;
        }
        else {
          $lname=$_POST["lname"];
        }

        //if adress1 is missing
        if(empty($_POST["add"])){
          $addErr="Missing";
          $error=1;
        }
        else {
          $add=$_POST["add"];
        }

        //if address 2 is missing
        if(empty($_POST["add2"])){
          $add2Err="Missing";
          $error=1;
        }
        else {
          $add2=$_POST["add2"];
        }

        //if city is Missing
        if(empty($_POST["city"])){
          $cityErr="Missing";
          $error=1;
        }
        else {
          $city=$_POST["city"];
        }

        //if telephone number is Missing
        if(empty($_POST["tele"])){
          $teleErr="Missing";
          $error=1;
        }
        else {
          if(is_numeric($_POST["tele"]) && strlen($_POST["tele"])==7){
            $tele=$_POST["tele"];
          }
          else{
            $teleErr="must follow the rules";
            $error=1;
          }
        }

        //if mobile is missing
        if(empty($_POST["mob"])){
          $mobErr="Missing";
          $error=1;
        }
        else {
          //if mobile checks rules
          if(is_numeric($_POST["mob"]) && strlen($_POST["mob"])==10){
            $mob=$_POST["mob"];
          }
          else{
            $mobErr="must follow the rules";
            $error=1;
          }
        }

        //if username is missing
        if(empty($_POST["Username"])){
          $UsernameErr="Missing";
          $error=1;
        }
        else {
          $Username=$_POST["Username"];
        }

        //if password is missing
        if(empty($_POST["psw"])){
          $pswErr="Missing";
          $error=1;
        }
        else {
          if (strlen($_POST["psw"])!=6){
            $pswErr="Must be 6 characters long";
            $error=1;
          }
        }

        //if confirm password is missing
        if(empty($_POST["conpsw"])){
          $conpswErr="Missing";
          $error=1;
        }
        else{
          if($_POST['psw']!=$_POST['conpsw']){
            $conpswErr="The passwords does't match";
            $error=1;
          }
        }


        if ($error == 0){
          //conect to database
          include 'php/connection.php';

          //check if username already exists
          $sql = "SELECT * FROM `User` WHERE `Username` = '$Username' ";
          $result = mysqli_query($con,$sql);

          //if there is an error
          if (!$result) {
            echo "<script type='text/javascript'>alert('Database Error Occured')</script>";
          }

          //if does not exist register the User
          if (mysqli_num_rows($result) == 0){
            $hashed_password = trim(password_hash($_POST['psw'], PASSWORD_BCRYPT, [12]));
            //add the user
            $sql = "INSERT INTO `User` (`Username`, `Password`, `FirstName`, `Surname`, `AddressLine1`, `AdressLine2`, `City`, `Telephone`, `Mobile`) VALUES ('$Username', '$hashed_password', '$fname', '$lname', '$add', '$add2', '$city', '$tele', '$mob')";
            mysqli_query($con,$sql);
            echo "<script type='text/javascript'>alert('Registration compleate')</script>";
            $fnameErr=$lnameErr=$addErr=$add2Err=$cityErr=$teleErr=$mobErr=$UsernameErr=$pswErr=$conpswErr="";
            $fname=$lname=$add2=$add=$city=$tele=$mob=$Username=$psw=$conpsw=$UsenameEx="";
            $log="Login";
          }
          else {
            $UsenameEx='username already exits';
          }
        }



      }


  }

?>
