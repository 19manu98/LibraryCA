<?php
    //if the user is not log in, he is not allowed to access this page
    session_start();
    if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    }
    include 'connection.php';
    $returnid=$_GET['id'];

    $sql2="SELECT * FROM Reservation WHERE ReservedId = ".$returnid;
    $result = mysqli_query($con,$sql2);
    $row=mysqli_fetch_array($result);
    $ISBN=$row["ISBN"];
    $sql="UPDATE Book SET Reserved='N' where ISBN = '" . $ISBN ."';";
    $sql1="DELETE FROM Reservation WHERE ReservedID =".$returnid;
    $result = mysqli_query($con,$sql);
    $result = mysqli_query($con,$sql1);

    echo "<script type='text/javascript'>alert('Booked compleated');
    window.location.href='myreservation.php?page=1';</script>";
?>
