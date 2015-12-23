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
          <li><a href="adminhome.html">Home</a></li>
          <li  class="selected"><a href="store.html">Store</a></li>
          <li><a href="editaccounts.php">Customer Accounts</a></li>
          <li><a href="shipping.php">Shipping Orders </a></li>
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
	  '.$ProductID.'
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
	  '.$ProductID.'
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
	  '.$ProductID.'
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
    <div id="content_footer"></div>
    <div id="footer">
    <p><a href="adminhome.html">Home</a> | <a href="store.html">Store</a> | <a href="editaccounts.php">Customer Accounts</a> | <a href="shipping.php">Shipping Orders </a></p>
	</div>
  </div>
	</body>
	</html>';
	echo $show;

?>