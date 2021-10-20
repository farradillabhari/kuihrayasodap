<html>
   <head>
	     <link rel="stylesheet" href="index.css">
       <link rel="stylesheet" href="displaycookies.css">
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


		<br><br><br>
    <table align="center" class="kuih">
      <tr>
        <th>Cookies Name</th>
        <th>Cookies Price</th>
        <th>Cookies Image</th>
        <th>Generate</th>
      </tr>

      <?php
      $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error());

      $sql = mysqli_query($conn,"select * from cookies");
      while($row = mysqli_fetch_assoc($sql))
      {
        ?>
        <tr>
        <td><?php echo $row['cookiesName'];?>   </td>
        <td><?php echo $row['cookiesPrice'];?>   </td>
        <td><?php echo $row['imageFile'];?>   </td>
        <td><a href="admindelete.php?delete=<?php echo $row['cookiesId'];?>">Delete</a>   
        <a href="updatestock.php?update=<?php echo $row['cookiesId'];?>">Update</a>  </td>
        </tr>
        <?php
      }?>

    </table>
    

  </body>

</html>
