<html>
   <head>
	     <link rel="stylesheet" href="index.css">
       <link rel="stylesheet" href="adminprofile.css">
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
              <a href="updatestock.php">Update Stock</a>
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
    <div class="box" style="height: 80%;">
      <img src="image/admin.jpg" alt="adminn" style="width: 45%;">
      <h3 style="color:black;"><?php echo $_SESSION['username'];?></h3>
      <p class="title">FOUNDER OF KUIH SODAP</p>
      <p class="title">Based in Kuala Kangsar, Perak</p>
    </div>
  </body>

</html>
