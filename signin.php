<!DOCTYPE html>
<html>
<head>
	     <link rel="stylesheet" href="form.css">
	     <link rel="stylesheet" href="index.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>

		<header class="head"> <img src="image/logo2.png" style="width: 10%;height: 15%;"></header>
	
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="login.php">Shop</a>
          
        <div class="dropdown">
              <button class="dropbtn">My Account
                    <i class="fa fa-caret-down"></i>
              </button>
          <div class="dropdown-content">
              <a href="signin.php">Sign In</a>
              <a href="login.php">Log In</a>
          </div>
        </div> 
          <a href="logout.php">Logout</a>
    </div>

		<br>

    <div class="form">
      <u> <h2 style="text-align: center;">Register Account</h2></u>
      <form name="login" method="post" action="signin.php">
   
        <label for="custName">Name</label><br><br>
        <input type="text" name="custName" required><br><br>

        <label for="custEmail">Email</label><br><br>
        <input type="text" name="custEmail"  required><br><br>

        <label for="custPhone">Phone No</label><br><br>
        <input type="text" name="custPhone" required><br><br>

        <label for="custUsername">Username</label><br><br>
        <input type="text" name="custUsername" required><br><br>

        <label for="custPassword">Password</label><br><br>
        <input type="password" name="custPassword" required><br><br>

        <input type="submit" name="register" value="Register" class="btn btn-success"><br>

        <h4 style="text-align: center;">Already have account?</h4><a href="login.php">Login</a>
      </form>
    </div>
  
</body>
</html>

<?php
   

   if(isset($_POST['register']))
   {
      extract($_POST);
      $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error()); 

     

     $custName =  $_POST["custName"];
     $custEmail = $_POST["custEmail"];
     $custPhone = $_POST["custPhone"];
     $custUsername = $_POST["custUsername"];
     $custPassword = $_POST["custPassword"];
     $user = "user";
  
     
     $sql = mysqli_query($conn, "insert into customer (customerId,custName,custEmail,custPhone,custUsername ,custPassword) values 
    (NULL,'$custName','$custEmail','$custPhone',' $custUsername',' $custPassword')");
      
      $sql2 = "insert into multilogin (id,username,password,role) values (NULL,'$custUsername','$custPassword','$user')";
      $query = mysqli_query($conn,$sql2);
    

    if($sql )
    {
      echo "<script>alert('Successfully register');</script>";
      header('location: login.php');
    }
    else
    {
      echo "failed";
    }
    
  
   }


?>
