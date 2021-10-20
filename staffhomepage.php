<html>
   <head>
	     <link rel="stylesheet" href="index.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    echo "<script>alert('Welcome admin!');</script>";

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


		<br><br><br>
    <h1 align="center">Hello <b><?php echo $_SESSION['role'];?></b>  <b><?php echo $_SESSION['username'];?> !</b></h1>
		<img src="image/logo.png" class="center" alt="" style="width:55% ;length:50%;"/>

  </body>

</html>
