<?php
    $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error($conn));

            echo "masukkk";
      	$id = $_GET['delete'];

      	$sql = "delete from cookies where cookiesId = '$id'";
      	$query = mysqli_query($conn,$sql)  or die(mysql_error($conn));;

      	if($sql)
      	{
      		echo "<script>alert('Successfully delete');</script>";
      		header("location : viewstock.php");
      	}
      	else
      	{
      		echo "<script>alert('Failed delete');</script>";
      	}

    


?>

