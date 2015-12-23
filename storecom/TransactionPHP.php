<?php
		 if(isset($_POST['submit'])){
			
			echo "Hello world!<br>";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "storecom";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$Transaction_ID   = $_POST['TransactionID'];
		
			$sql = "SELECT(*) FROM  order_processing ";
			$res = mysqli_query($conn,$sql);
			$check = False ;
			if (mysqli_num_rows($res) > 0) {
			  while($row = mysqli_fetch_assoc($res)) {
	 		     if($Phone ===$row["Phone"]){
					$TransactionID       = $row['TransactionID'];
					$CustomerID          = $row['CustomerID'];
					$ProductID  		 = $row['ProductID'];
					$Quantity  			 = $row['Quantity'];
					$dateTime			 = $row['dateTime'];
					$Processed  		 = $row['Processed'];
					$Shipped			 = $row['Shipped'];
					$DateShipped		 = $row['DateShipped'];
					$TrackingNumber	     = $row['TransactionID'];
					$ShippingCompany     = $row['ShippingCompany'];
					$check = true;
					}
				}
			} 
		   if($check){
		    $host = $_SERVER ['HTTP_HOOST'];
			$uri =rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			$extra = 'ordertracking2.html';
			header ("location: $host$uri/$extra?TransactionID=$TransactionID&CustomerID=$CustomerID&ProductID=$ProductID&Quantity=$Quantity&dateTime=$dateTime&Processed=$Processed&Shipped=$Shipped&DateShipped=$DateShipped&TrackingNumber=$TrackingNumber&ShippingCompany=$ShippingCompany");
			} else {
			$serve = $_SERVER['HTTP_REFERER'];   /// to back at the same page 
			header ("location: $serve");
			}
			
			$conn->close();
		}
	?> 