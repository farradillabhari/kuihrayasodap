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
        <?php 
            $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error()); 
             if (isset($_GET['update']))
             {
                $id = $_GET['update'];
                $update = true;
                $record = mysqli_query($conn, "SELECT * FROM cookies WHERE cookiesId=$id");

                if ($record)
                {
                  $n = mysqli_fetch_array($record);
                  $cookiesName = $n['cookiesName'];
                  $imageFile = $n['imageFile'];
                  $cookiesPrice = $n['cookiesPrice'];
                  $cookiesId=$n['cookiesId'];
                }
                error_reporting(E_ERROR | E_PARSE);
              }
        ?>
     
      <form  name="updatestock" method="post" action="updatestock.php" >

        <input type="hidden" name="cookiesId" value="<?php echo $cookiesId; ?>">
        <label for="cookiesName">Cookies Name:</label><br><br>
        <input type="text" name="cookiesName" value="<?php echo $cookiesName; ?>" required><br><br>

        <label for="cookiesPrice"> Cookies Price :</label><br><br>
        <input type="text" name="cookiesPrice" value="<?php echo  $cookiesPrice; ?>" required><br><br>

        <label for="imageFile">Upload Image :</label><br><br>
        <input type="file" name="imageFile" value="<?php echo  $imageFile; ?>" style="font-size: 20px;" required><br><br><br>

        <input type="submit" name="save" value="Save" class="btn btn-success"><br>

      </form>
    </div>


  </body>
</html>

<?php
if (isset($_POST['save'])) {
   $conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error()); 

  $cookiesName = $_POST['cookiesName'];
  $cookiesPrice = $_POST['cookiesPrice'];
  $imageFile = $_POST['imageFile'];
  $cookiesId = $_POST['cookiesId'];

  mysqli_query($conn, "UPDATE cookies SET cookiesName=' $cookiesName', cookiesPrice='$cookiesPrice', imageFile= '$imageFile ' WHERE cookiesId=$cookiesId");
  header('location: viewstock.php');
}

?>