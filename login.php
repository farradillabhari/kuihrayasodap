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
       
    </div>

		<br><br><br>

	<form  method="post" action="login.php">
		<div class="form">
			<label for="username">Username</label><br><br>
			<input type="text" name="username" required><br><br>

			<label for="password">Password</label><br><br>
			<input type="password" name="password" required><br><br>

			<input type="submit" name="login" value="Login" class="btn btn-success">
 		</div>
	</form>
            
  
</body>
</html>

<?php
	$conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect to the database".mysqli_error());

	session_start();

	$username = isset($_POST["username"]) ;
    $password = isset($_POST["password"]) ;
	

	if(isset($_POST['login']))
	{
		echo "dah masuk";
		extract($_POST);
		$sql = mysqli_query($conn,"select * from multilogin where username='$username' and password='$password'") or die ("could not connect to the database".mysqli_error());
        
        $row = mysqli_num_rows($sql);
        print("value = ".$row);

        if($row > 0)
        {
        	echo ("masuk loop");
			
        	$data = mysqli_fetch_assoc($sql);

        	if($data['role'] == "adminstaff")
        	{
        		echo "masuk admin";
        		$_SESSION['username'] = $username;
        		$_SESSION['password'] = $password;
        		$_SESSION['role'] = "admin";
        		header('location:staffhomepage.php');

        	}
        	if($data['role'] == "user")
        	{
        		echo "masuk user";
        		$_SESSION['username'] = $username;
        		$_SESSION['password'] = $password;
        		$_SESSION['role'] = "user";
        		header('location:customerhomepage.php');

        	}
        }
        else
        {
        	echo "<script>alert('Wrong username and password');</script>";
        }
    }
			

?>