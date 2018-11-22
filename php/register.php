<?php
  //display nothing at the beggining
  $fnameErr=$lnameErr=$addErr=$add2Err=$cityErr=$teleErr=$mobErr=$UsernameErr="";
  $fname=$lname=$add2=$add=$city=$tele=$mob=$Username="";
  $log="";

  //check if form is completed
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //if First Name is missing
    if(empty($_POST["fname"])){
      $fnameErr="Missing";
      $log='showsig()';
    }
    else {
      $fname=$_POST["fname"];
    }

    //is lastname i missinf
    if(empty($_POST["lname"])){
      $lnameErr="Missing";
      $log='showsig()';
    }
    else {
      $lname=$_POST["lname"];
    }

    //if adress1 is missing
    if(empty($_POST["addErr"])){
      $addErr="Missing";
      $log='showsig()';
    }
    else {
      $add=$_POST["add"];
    }

    //if address 2 is missing
    if(empty($_POST["add2"])){
      $add2Err="Missing";
      $log='showsig()';
    }
    else {
      $add2=$_POST["add2"];
    }

    //if city is Missing
    if(empty($_POST["city"])){
      $cityErr="Missing";
      $log='showsig()';
    }
    else {
      $city=$_POST["city"];
    }

    //if telephone number is Missing
    if(empty($_POST["tele"])){
      $teleErr="Missing";
      $log='showsig()';
    }
    else {
      $tele=$_POST["tele"];
    }

    //if mobile is missing
    if(empty($_POST["mob"])){
      $mobErr="Missing";
      $log='showsig()';
    }
    else {
      $mob=$_POST["mob"];
    }
  }

?>
