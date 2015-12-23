<?php
$category = $_POST['category'];
$itemname = $_POST['itemname'];
$itemdescription = $_POST ['itemdescription'];
$itemdescription2 = $_POST ['itemdescription2'];
$picture = $_POST ['picture'];
$price = $_POST ['price'];
$productid =$_POST ['productid'];
$quantity = $_POST ['quantity'];
$s=0;

$con = mysqli_connect("localhost","root","","storecom");
if ($con -> connect_error){
die ("connection failed: ". $con -> connect_error);
}

if($category==""||$itemname==""||$itemdescription==""||$itemdescription2==""||$picture==""||$price==""||$productid==""||$quantity==""||$s==1)
{	if($s==1){
		echo "Product already exists " ;
		}
		else 
	{
	echo"please fill all fields!";
	}
}
else
{

$sql="INSERT INTO `product`(`ProductID`, `ItemName`, `ItemDescription`, `QuantityInStock`, `Price`, `Category`, `Picture`, `ItemDescription2`) VALUES ( '$productid' , '$itemname' , '$itemdescription' ,  '$quantity' , '$price' , '$category', '$picture', '$itemdescription2' )";
echo "Inserted successfully";

$result = $con -> query($sql);
}
?>