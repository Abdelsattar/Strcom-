<?php 
	$con = mysqli_connect("localhost","root","","storecom");
	$strSQL = "select * from product";
	$Result = mysqli_query($con,$strSQL);
	$ItemDescription="";
	$ItemDescription2="";
	$ItemName="";
	$Picture="";
	$Price="";
	$ProductID="";
	$QuantityInStock="";
	$Visible="";
	$show='
<html>
<head>
  <title>StoreCom</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div class="selected" id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
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
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <br><br>
	  <br>
	  <form action="selectItems.php" method="post" >
	  ';
	$count=0;
	while($strrow = mysqli_fetch_array($Result))
	{
		$count++;
		$ItemDescription=$strrow['ItemDescription'];
		$ItemDescription2=$strrow['ItemDescription2'];
		$ItemName=$strrow['ItemName'];
		$Picture=$strrow['Picture'];
		$Price=$strrow['Price'];
		$ProductID=$strrow['ProductID'];
		$QuantityInStock=$strrow['QuantityInStock'];
		$Visible=$strrow['Visible'];
		if($count%3==1)
		{
			$show=$show.'
	<section class="right">
	  ID: '.$ProductID.'<br> available quantity: '.$QuantityInStock.'
	  <h4><strong>'.$ItemName.'</strong></h4>
      <h4>&nbsp;</h4>
      <h4><img src="'.$Picture.'" width="222" height="272">
      </h4>
      <ul>
        <li>'.$ItemDescription.'<br>
        </li>
        <li>'.$ItemDescription2.'</li>
        <li><strong>price: '.$Price.' </strong>        </li>
      </ul>
      <p>&nbsp;</p>
    </section>
			';
		}
		else if($count%3==2)
		{
			$show=$show.'
	<section class="left">
	  ID: '.$ProductID.'<br> available quantity: '.$QuantityInStock.'
	  <h4><strong>'.$ItemName.'</strong></h4>
      <h4>&nbsp;</h4>
      <h4><img src="'.$Picture.'" width="222" height="272">
      </h4>
      <ul>
        <li>'.$ItemDescription.'<br>
        </li>
        <li>'.$ItemDescription2.'</li>
        <li><strong>price: '.$Price.' </strong>        </li>
      </ul>
      <p>&nbsp;</p>
    </section>
			';
		}
		else if($count%3==0)
		{
			$show=$show.'
	<section class="center">
	  ID: '.$ProductID.'<br> available quantity: '.$QuantityInStock.'
	  <h4><strong>'.$ItemName.'</strong></h4>
      <h4>&nbsp;</h4>
      <h4><img src="'.$Picture.'" width="222" height="272">
      </h4>
      <ul>
        <li>'.$ItemDescription.'<br>
        </li>
        <li>'.$ItemDescription2.'</li>
        <li><strong>price: '.$Price.' </strong>        </li>
      </ul>
      <p>&nbsp;</p>
    </section>
			';
		}
			
	}
	$show=$show.'
	<p><span><b>enter the ID of selections here: (ex: 1, 2, 3, etc) <b></span><input type="text" name="selection" /></p>
	<p><span><b>enter the quantity of each item you want here: (ex: 2, 4, 1, etc) <b></span><input type="text" name="selectionN" /></p>
	<p><span><b>enter your mobile number <b></span><input type="text" name="mobile" /></p>
	<button type="submit">go to Shopping Cart </button>
	<br><br><br><br><br><br><br>
    </div>
	</form>
    <div id="content_footer"></div>
    <div id="footer">
    <p><a href="index.html">Home</a> | <a href="productlist.html">Product List</a> | <a href="signup.html">Sign Up</a> | <a href="editprofile.html">Edit Profile</a> | <a href="contact.html">Contact Us</a></p>
	</div>
  </div>
	</body>
	</html>';
	echo $show;

?>