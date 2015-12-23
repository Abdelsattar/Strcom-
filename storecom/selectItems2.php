<?php
	session_start();
	$selection = $_POST['selection'];
	$sel = explode(", ", $selection);
	$sel2=explode(", ", $_SESSION["selection"]);
	$selectionN = $_POST['selectionN'];
	$selN = explode(", ", $selectionN);
	$selN2 = explode(", ", $_SESSION["selectionN"]);
	if(($selection =="" && $selectionN!="")||($selection !="" && $selectionN==""))
	{	
		header("Location: allproducts.php");
	}
	else{
	$flag=0;
	if($selection =="" && $selectionN=="") 
	{
		$flag=1;
		$selection = $_SESSION["selection"];
		$sel = explode(", ", $selection);
		$selectionN = $_SESSION["selectionN"];
		$selN = explode(", ", $selectionN);
	}
	$con = mysqli_connect("localhost","root","","storecom");
	$code='
	<html>

<head>
  <title>StoreCom</title>
  
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Store<span class="logo_colour">Com</span></a></h1>
          <h2>compare, select and buy your mobile</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.html">Home</a></li>
          <li class="selected"><a href="productlist.html">Product List</a></li>
          <li><a href="signup.html">Sign Up</a></li>
          <li><a href="editprofile.html">Edit Profile</a></li>
          <li><a href="signin.html">Login</a></li>
        </ul>
      </div>
    </div>  
	<h1>you have chosen these items:<h1>
	';
	$customer=$_SESSION["ID"];
		$s2=0;
		$con = mysqli_connect("localhost","root","","storecom");
		for($i=0;$i<sizeof($sel);$i++)
		{
			$totalP=0;
			$strSQL = "select * from product where ProductID = '$sel[$i]'";
			$Result = mysqli_query($con,$strSQL);
			while($strrow = mysqli_fetch_array($Result))
			{
				$itemname = $strrow['ItemName'];
				$price=$strrow['Price'];
				$s=intval($sel[$i]);
				$N=intval($selN[$i]);
				$p=$strrow['ProductID'];
				$s2+=$N;
				$price *= $N;
				$totalP+=$price;
				$code=$code.'
				<div id="content">
					<p>
						Item ID: '.$p.'
						<br>
						Item name: '.$itemname.'
						<br>
						Item price: '.$strrow['Price'].'
						<br>
						Quantity: '.$selN[$i].'
						<br>
						Total price: '.$totalP.'
						<br>
					</p>
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br>
				';
			}
		}	
		if($flag==0)
		{
			$t2=$_SESSION["date"];
			$tim=date('Y-m-d H:i:s');
			$sql = "UPDATE orderprocessing SET Quantity='$s2', dateTime='$tim' WHERE CustomerID='$customer' and dateTime='$t2'";
			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}
			for($i=0;$i<sizeof($sel2);$i++)
			{
				$totalP=0;
				$strSQL = "select * from product where ProductID = '$sel2[$i]'";
				$Result = mysqli_query($con,$strSQL);
				while($strrow = mysqli_fetch_array($Result))
				{
					$itemname = $strrow['ItemName'];
					$price=$strrow['Price'];
					$s=intval($sel2[$i]);
					$N=intval($selN2[$i]);
					$p=$strrow['ProductID'];
					$s2+=$N;
					$price *= $N;
					$totalP+=$price;
					$quan=$strrow['QuantityInStock'];
					$quan+=$N;
				}
				$sql = "UPDATE product SET QuantityInStock='$quan' WHERE  ProductID = '$sel2[$i]'";
				if (!mysqli_query($con,$sql))
				{
					die('Error: ' . mysqli_error($con));
				}
			}
			for($i=0;$i<sizeof($sel);$i++)
			{
				$totalP=0;
				$strSQL = "select * from product where ProductID = '$sel[$i]'";
				$Result = mysqli_query($con,$strSQL);
				while($strrow = mysqli_fetch_array($Result))
				{
					$itemname = $strrow['ItemName'];
					$price=$strrow['Price'];
					$s=intval($sel[$i]);
					$N=intval($selN[$i]);
					$p=$strrow['ProductID'];
					$s2+=$N;
					$price *= $N;
					$totalP+=$price;
					$quan=$strrow['QuantityInStock'];
					$quan-=$N;
				}
				$sql = "UPDATE product SET QuantityInStock='$quan' WHERE  ProductID = '$sel[$i]'";
				if (!mysqli_query($con,$sql))
				{
					die('Error: ' . mysqli_error($con));
				}
			}
			$_SESSION["date"]=$tim;
		}
		$con->close();
		$code=$code.'  
		<form action="check.php" method="post">
		<button type="submit">purchase</button>
		</form>
		</div>
		<div id="content_footer"></div>
		<div id="footer">
		<p><a href="index.html">Home</a> | <a href="productlist.html">Product List</a> | <a href="signup.html">Sign Up</a> | <a href="editprofile.html">Edit Profile</a> | <a href="signin.html">Login</a></p>
		</div>
		</div>
		</body>
		</html>';
		echo $code;
	}
	?>
