<html>
   <head>
	     <link rel="stylesheet" href="index.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <script>alert('Hi dear customer, enjoy your shopping!');</script>
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
              <button class="dropbtn">Shop
                    <i class="fa fa-caret-down"></i>
              </button>
          <div class="dropdown-content">
              <a href="addtocart.php">Cookies </a>
          </div>
        </div>
          <a href="logout.php">Log out</a> 
    </div>


		<br><br><br>
    <h1 align="center">Hello <b><?php echo $_SESSION['role'];?></b>  <b><?php echo $_SESSION['username'];?> !</b></h1>
		<img src="image/logo.png" class="center" alt="" style="width:55% ;length:50%;"/>

  </body>

</html>
