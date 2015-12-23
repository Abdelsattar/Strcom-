<?php
	session_start();
	$mobile = $_POST['mobile'];
	$selection = $_POST['selection'];
	$sel = explode(", ", $selection);
	$selectionN = $_POST['selectionN'];
	$selN = explode(", ", $selectionN);
	$_SESSION["selection"] = $selection;
	$_SESSION["selectionN"] = $selectionN;
	if($mobile=="" || $selection =="" || $selectionN=="")
	{	
		header("Location: allproducts.php");
	}
	$con = mysqli_connect("localhost","root","","storecom");
	$strSQL = "select * from customer where Phone = '$mobile'";
	$Result = mysqli_query($con,$strSQL);
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
	$check=0;
	$customer="";
	while($strrow = mysqli_fetch_array($Result))
	{
		$mob=$strrow['Phone'];
		$customer=$strrow['CustomerID'];
		$_SESSION["ID"] = $customer;
		if($mob == $mobile) $check=1;
	}
	if($check==1)
	{
		$s2=0;
		$con = mysqli_connect("localhost","root","","storecom");
		for($i=0;$i<sizeof($sel);$i++)
		{
			$totalP=0;
			$strSQL = "select * from product where ProductID = '$sel[$i]'";
			$Result = mysqli_query($con,$strSQL);
			$quan=0;
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
				<form action="selectItems2.php" method="post">
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
				$quan=$strrow['QuantityInStock'];
				$quan-=$N;
			}
			$sql = "UPDATE product SET QuantityInStock='$quan' WHERE  ProductID = '$sel[$i]'";
			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}
		}	
		$tim=date('Y-m-d H:i:s');
		$_SESSION["date"] = $tim;
		$sql="INSERT INTO orderprocessing (CustomerID, Quantity, dateTime, Processed, Shipped) VALUES ('$customer','$s2','$tim','0','0')";
		$s1=0;
		if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		$con->close();
		$code=$code.'  
		 <form action="selectItems2.php" method="post">
		<p>if you want to modify on your order please fill these fields then click submit</p>
		<p>else click submit only</p>
		<p><span><b>enter the ID of selections here: (ex: 1, 2, 3, etc) <b></span><input type="text" name="selection" /></p>
		<p><span><b>enter the quantity of each item you want here: (ex: 2, 4, 1, etc) <b></span><input type="text" name="selectionN" /></p>
		<button type="submit">submit</button>
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
	else
	{
		echo "please sign up firstly";
		$put="window.location.href='signup.html'";
		echo '<form><input type="button" value="sign up" onClick="'.$put.'"></form>';
	}
?>
