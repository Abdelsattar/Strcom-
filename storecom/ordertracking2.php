<!DOCTYPE HTML>
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
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.html">Home</a></li>
		  <li><a href="productlist.html">Product List</a></li>
          <li><a href="signup.html">Sign Up</a></li>
          <li><a href="editprofile.html">Edit Profile</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
      <div id="content">
        <!-- insert the page content here -->
        
        <h2>Order Tracking </h2>
        <form  name= "myForm"  method="post">
          <div class="form_settings">
		   <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "storecom";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$TransactionID   = $_POST['TransactionID'];
			echo "<p> Transaction ID : ".$TransactionID."</p>";
			$sql = "SELECT * FROM  orderprocessing WHERE TransactionID ='$TransactionID' ";
					
					$res = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($res);
					$Quantity  			 = $row['Quantity'];
					$dateTime			 = $row['dateTime'];
					$Processed  		 = $row['Processed'];
					$Shipped			 = $row['Shipped'];
					$DateShipped		 = $row['DateShipped'];
					$ShippingCompany     = $row['ShippingCompany'];
			echo "<p> Ordered Quantity : " . $Quantity . "</p> ";
			if ( $Shipped == 1 )
            echo "<p> Your Product Shipped with Company " . $ShippingCompany ." At Date Time " .$DateShipped . "</p>";
			
			else			
			echo "<p> Your Product didn't Shipped yet </p>";
			
			$conn->close();
		
	?> 
		  
          </div>
        </form>
      </div>
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
	<br><br><br><br><br><br><br><br>
    <div id="content_footer"></div>
    <div id="footer">
    <p><a href="index.html">Home</a> | <a href="productlist.html">Product List</a> | <a href="signup.html">Sign Up</a> | <a href="editprofile.html">Edit Profile</a> | <a href="contact.html">Contact Us</a></p>
	</div>
  </div>
</body>
</html>
