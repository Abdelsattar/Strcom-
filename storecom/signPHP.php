<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "storecom";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			 
			$FirstName   	  = $_POST['FirstName'];
			$LastName         = $_POST['LastName'];
 			$BillingAddress   = $_POST['BillingAddress'];
			$BillingCity  	  = $_POST['BillingCity'];
			$BillingState 	  = $_POST['BillingState'];
			$BillingZip   	  = $_POST['BillingZip'];
			$Phone	      	  = $_POST['Phone'];
			$Email		   	  = $_POST['Email'];
			$Password	      = $_POST['Password'];
			$ConfirmPassword  = $_POST['ConfirmPassword'];

			$sql= " INSERT into customer (FirstName , LastName , BillingAddress , BillingCity ,BillingState, BillingZip ,Phone, Email ,Password)
			values ( '$FirstName' ,'$LastName','$BillingAddress','$BillingCity','$BillingState','$BillingZip','$Phone' ,'$Email' ,'$Password')";
			
		    $res = mysqli_query($conn,$sql);
			
			require "index.html";
			exit;
			
			
		 	$conn->close();
			
			
		?> 