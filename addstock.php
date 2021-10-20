<!DOCTYPE html>
<html>
   <head>
	      <link rel="stylesheet" href="form.css">
       <link rel="stylesheet" href="index.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       
  </head>
  <body>

    <?php 
      session_start();
      if($_SESSION['role']=="")
      {
        header("location:login.php");
      }
    ?>
		<header class="head"> <img src="image/logo2.png" style="width: 10%;height: 15%;"></header>
	
    <div class="navbar">
        <a href="index.php">Home</a>

        <div class="dropdown">
              <button class="dropbtn">Stock Cookies
                    <i class="fa fa-caret-down"></i>
              </button>
          <div class="dropdown-content">
              <a href="addstock.php">Add Stock</a>
              <a href="viewstock.php">View Stock</a>
          </div>
        </div> 
          
        <div class="dropdown">
              <button class="dropbtn">My Account
                    <i class="fa fa-caret-down"></i>
              </button>
          <div class="dropdown-content">
              <a href="adminprofile.php">My Profile</a>
              <a href="logout.php">Logout</a>
          </div>
        </div> 

        
         
    </div>


		<br><br>

    <div class="form">
      <u> <h2 style="text-align: center;">Add Stock Kuih Raya</h2></u>

      <form name="addstock" method="post" action="addstock.php" enctype=”multipart/form-data” >
        <label for="cookiesName">Cookies Name:</label><br><br>
        <input type="text" name="cookiesName" required ><br><br>

        <label for="cookiesPrice"> Cookies Price :</label><br><br>
        <input type="text" name="cookiesPrice" required><br><br>

        <label for="imageFile">Upload Image :</label><br><br>
        <input type="file" name="imageFile" style="font-size: 20px;" required><br><br><br><br><br>

        <input type="submit" name="add" value="Add" class="btn btn-success"><br>

      </form>
    </div>
    

  </body>

</html>

<?php

  if(isset($_POST['add']))
  {
    extract($_POST);
    $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error()); 

    $cookiesName = $_POST["cookiesName"];
    $cookiesPrice = $_POST["cookiesPrice"];
    $imageFile = $_POST["imageFile"];

    $sql = "insert into cookies(cookiesId,cookiesName,cookiesPrice,imageFile,staffId) values 
    (NULL,'$cookiesName','$cookiesPrice','$imageFile',1)";
    $query = mysqli_query($conn,$sql);

    if($sql)
    {
       echo "<script>alert('Successfully add');</script>";
    }
    else
    {
      echo "failed";
    }


  }
?>