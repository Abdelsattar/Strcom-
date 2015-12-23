<?php
		 	session_start();	
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "storecom";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$lol = $_SESSION['PHONE'] ; 
			
			$FirstName   		   = $_POST['FirstName'];
			$LastName    		   = $_POST['LastName'];
 			$BillingAddress   	   = $_POST['BillingAddress'];
			$BillingCity  		   = $_POST['BillingCity'];
			$BillingState		   = $_POST['BillingState'];
			$BillingZip 		   = $_POST['BillingZip'];
			$Email		 		   = $_POST['Email'];
			$Password	  		   = $_POST['Password'];
		
			// query to update
			
			
				$sql = "UPDATE customer SET FirstName = '$FirstName', LastName = '$LastName',BillingAddress = '$BillingAddress', BillingCity = '$BillingCity', BillingState = '$BillingState', BillingZip = $BillingZip,Email = '$Email', Password = '$Password' WHERE Phone = '$lol';";
			echo mysql_error();
			echo $FirstName . " ". $LastName ." " . $BillingAddress ." ". $BillingCity ." ". $BillingState ." " .$BillingZip ." ". $Email ." ". $Password ." " ;
			$res = mysqli_query($conn,$sql);
			$serve = $_SERVER['HTTP_REFERER'];   /// to back at the same page 
			$host = $_SERVER ['HTTP_HOOST'];
			$uri =rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			$extra = '../editprofile2.html';
			
			header ("location: $serve?FirstName=$FirstName&LastName=$LastName&BillingAddress=$BillingAddress&BillingCity=$BillingCity&BillingState=$BillingState&BillingZip=$BillingZip");
			
		    $conn->close();
		
		?> 