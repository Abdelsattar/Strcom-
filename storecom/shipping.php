<?php
$out='<html>
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
          <li><a href="adminhome.html">Home</a></li>
          <li  class="selected"><a href="store.html">Store</a></li>
          <li><a href="editaccounts.php">Customer Accounts</a></li>
          <li><a href="shipping.php">Shipping Orders </a></li>
        </ul>
      </div>
    </div>
      <div id="content">';
	  
	  $out2='</div>
    </div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="content_footer"></div>
    <div id="footer">
    <p><a href="adminhome.html">Home</a> | <a href="store.html">Store</a> | <a href="editaccounts.php">Customer Accounts</a> | <a href="shipping.php">Shipping Orders </a></p>
	</div>
  </div>
</body>
</html>
	 ';
	 
	 
	$con = mysqli_connect("localhost","root","","storecom");
	$strSQL1 = "select * from orderprocessing where Shipped = '0'";
	$Result1 = mysqli_query($con,$strSQL1);
	while($strrow = mysqli_fetch_array($Result1))
	{
		$tran=$strrow['TransactionID'];
		$quan=$strrow['Quantity'];
		$tim=$strrow['dateTime'];
		$cust=$strrow['CustomerID'];
		$out=$out.'
		<p><b>Transaction ID: '.$tran.'</b></p>
		<p><b>Ordered Quantity: '.$quan.'</b></p>
		<p><b>Order Time: '.$tim.'</b></p>
		<p><b>Customer ID: '.$cust.'</b></p>
		<br><br>
		';
	}
	$sql = "UPDATE orderprocessing SET Processed='1' WHERE dateTime = '$time'";
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}
	$strSQL1 = "select * from orderprocessing where dateTime = '$time'";
	$Result1 = mysqli_query($con,$strSQL1);
	$trans="";
	while($strrow = mysqli_fetch_array($Result1))
	{
		$tran=$strrow['TransactionID'];
	}
	
	
	 $out=$out.$out2;
	 echo $out;
?>