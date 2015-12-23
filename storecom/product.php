<?php
	$n=$_POST['name'];
	if($n==1)
	{
		header("Location: sony.php");
		die();
	}
	else if($n==2)
	{
		header("Location: samsung.php");
		die();
	}
	else if($n==3)
	{
		header("Location: nokia.php");
		die();
	}
	else
	{
		header("Location: allproducts.php");
		die();
	}
?>