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
			$Phone = $_POST['Phone'];
			$_SESSION['PHONE'] = $Phone ;
			$sql = "SELECT * FROM customer where Phone = $Phone";
			$res = mysqli_query($conn,$sql);
			$check = False ;
			if (mysqli_num_rows($res) > 0) {
			  while($row = mysqli_fetch_assoc($res)) {
	 		     
					$First_Name       = $row['FirstName'];
					$LastName         = $row['LastName'];
					$BillingAddress   = $row['BillingAddress'];
					$BillingCity      = $row['BillingCity'];
					$BillingState     = $row['BillingState'];
					$BillingZip       = $row['BillingZip'];
					$Phone		      = $row['Phone'];
					$Email		      = $row['Email'];
					$Password	      = $row['Password'];
					$ConfirmPassword  = $row['Password'];
					$check = true;
					
				}
			} else {
			echo "0 results";
			}
		   if($check){
		   
				$host = $_SERVER ['HTTP_HOOST'];
				$uri =rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				$extra = 'editprofile2.html';
				header ("location: $host$uri/$extra?FirstName=$First_Name&LastName=$LastName&BillingAddress=$BillingAddress&BillingCity=$BillingCity&BillingState=$BillingState&BillingZip=$BillingZip&Phone=$Phone&Email=$Email&Password=$Password&ConfirmPassword=$Password");
			} else {
				$serve = $_SERVER['HTTP_REFERER'];   /// to back at the same page 
				header ("location: $serve");
			}
			
			$conn->close();
		
		?> 