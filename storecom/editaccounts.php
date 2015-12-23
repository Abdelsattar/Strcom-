<? php
$show =' 
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
          <h1><a href="index.html">Store<span class="logo_colour">Com</span></a></h1>
          <h2>compare, select and buy your mobile</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="adminhome.html">Home</a></li>
          <li><a href="store.html">Store</a></li>
          <li class="selected"><a href="editaccounts.php">Customer Accounts</a></li>
          <li><a href="shipping.php">Shipping Orders </a></li>
        </ul>
      </div>
    </div>
	
      
      <div id="content">';
	  
	  $con = mysqli_connect("localhost","root","","storecom");
	  $sql="SELECT FirstName, LastName From customer";
	  $i=0;
	  while($strrow = mysqli_fetch_array($Result))
	  {$i++;
		$FirstName=$strrow['FirstName'];
		$show=$show.'
			<from action = "" method = "POST" >
			<h2><span>Select Customer </span>
			<select name="'.$sql.'">
		    <option value="'.i.'"></option>
			</select>
			<br><br>
			<button type="submit">select</button>
			
			</form>
			';
	 }
	  	  
		  
	  $show=$show.'
	  
	</div>
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
	  echo $show;
?>