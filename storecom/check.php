<?php
	session_start();
	$time=$_SESSION["date"];
	$con = mysqli_connect("localhost","root","","storecom");
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
          <li><a href="index.html">Home</a></li>
          <li><a href="productlist.html">Product List</a></li>
          <li class="selected"><a href="signup.html">Sign Up</a></li>
          <li><a href="editprofile.html">Edit Profile</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
      <div id="content">
	  <b> your transaction number is: '.$tran.' please do not forget it<b>
	  
	  ';
	  $out2='</div>
        </form>
      </div>
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="productlist.html">Product List</a> | <a href="signup.html">Sign Up</a> | <a href="editprofile.html">Edit Profile</a> | <a href="contact.html">Contact Us</a></p>
	  </div>
  </div>
</body>
</html>
	 ';
	 $out=$out.$out2;
	 echo $out;
?>