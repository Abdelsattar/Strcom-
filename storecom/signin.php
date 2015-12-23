<?php
	$email=$_POST['email'];
	$password = $_POST['pass'];
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
          <h1><a href="index.html">Store<span class="logo_colour">Com</span></a></h1>
          <h2>compare, select and buy your mobile</h2>
        </div>
      </div>
      
    </div>
      <div id="content">';
	  $s1=0;
	  $s2=0;
	  $con = mysqli_connect("localhost","root","","storecom");
	if($email==""||$password=="")
	{
		$s1=1;
		$out=$out.'
		<form action="signin.html" method="post">
		<p><b>please enter email and password</b></p>
		<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="Log In" /></p>
		</form>';
	}
	else
	{
		$strSQL = "select * from admin where userName = '$email' and Password = '$password'";
		$Result = mysqli_query($con,$strSQL);
		while($strrow = mysqli_fetch_array($Result))
		{
			header("Location: adminhome.html");
		}
	}
	
	if($s2==0)
	{
		$strSQL = "select * from customer where Email = '$email' and Password = '$password'";
		$Result = mysqli_query($con,$strSQL);
		while($strrow = mysqli_fetch_array($Result))
		{
			header("Location: index.html");
		}
	}
	$out=$out.'</div>
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
	 if($s1==1){echo $out;}
?>