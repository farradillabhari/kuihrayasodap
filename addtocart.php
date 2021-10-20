<?php 
session_start();
$conn = mysqli_connect("localhost","root","","kuihraya") or die ("could not connect".mysqli_error()); 


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array(isset($_GET["cookiesId"]), $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'cookiesId'			=>	$_GET["cookiesId"],
				'cookiesName'			=>	$_POST["cookiesName"],
				'cookiesPrice'		=>	$_POST["cookiesPrice"],
				'quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'cookiesId'			=>	$_GET["cookiesId"],
			'cookiesName'			=>	isset($_POST["cookiesName"]),
			'cookiesPrice'		=>	$_POST["cookiesPrice"],
			'quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["cookiesId"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="addtocart.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		 <link rel="stylesheet" href="form.css">
	    <link rel="stylesheet" href="index.css">
       	<link rel="stylesheet" href="displaycookies.css">
       
      
       	<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="head"> <img src="image/logo2.png" style="width: 10%;height: 15%;"></header>
	
    <div class="navbar">
        <a href="customerhomepage.php">Home</a>

        <div class="dropdown">
              <button class="dropbtn">Shop
                    <i class="fa fa-caret-down"></i>
              </button>
          <div class="dropdown-content">
              <a href="listkuih.php">View Cookies</a>
          </div>
        </div> 
          <a href="logout.php">Log out</a> 
    </div>
			<br><br><br>
			<?php
				$query = "SELECT * FROM cookies ORDER BY cookiesId ASC";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div>
				<form method="post" action="addtocart.php?action=add&id=<?php echo $row["cookiesId"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="image/<?php echo $row["imageFile"]; ?>"  /><br />

						<h4><?php echo $row["cookiesName"]; ?></h4>

						<h4>$ <?php echo $row["cookiesPrice"]; ?></h4>

						<input type="text" name="quantity"   />

						<input type="hidden" name="cookiesName" value="<?php echo $row["cookiesName"]; ?>" />

						<input type="hidden" name="cookiesPrice" value="<?php echo $row["cookiesPrice"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;"  value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div>
				<table class="kuih">
					<tr>
						<th >Item Name</th>
						<th >Quantity</th>
						<th >Price</th>
						<th >Total</th>
						<th >Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $values)
						{
					?>
					<tr>
						<td><?php echo $values["cookiesName"]; ?></td>
						<td><?php echo $values["quantity"]; ?></td>
						<td>$ <?php echo $values["cookiesPrice"]; ?></td>
						<td>$ <?php echo number_format($values["quantity"] * $values["cookiesPrice"], 2);?></td>
						<td><a href="addtocart.php?action=delete&id=<?php echo $values["cookiesId"]; ?>"><span >Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["quantity"] * $values["cookiesPrice"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<br>
					<?php
					}
					?>
					<br>
					<br>	
				</table>
				<br><br>
				<button style="width: 50%;
  background-color: #E6E8EA;padding: 14px 20px;" onclick="myFunction()">Pay Now</button><script>
					function myFunction() {
  					alert("Thank you for shopping with us!");
					}</script>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

