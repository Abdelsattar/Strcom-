<?php
   $category = $_POST['category'];
$itemname = $_POST['itemname'];
$itemdescription = $_POST ['itemdescription'];
$itemdescription2 = $_POST ['itemdescription2'];
$price = $_POST ['price'];
$productid =$_POST ['productid'];
$quantity = $_POST ['quantity'];

$con = mysqli_connect("localhost","root","","storecom");
if ($con -> connect_error){
die ("connection failed: ". $con -> connect_error);
}


if($category==""||$itemname==""||$itemdescription==""||$itemdescription2==""||$price==""||$productid==""||$quantity==""||$s==1)
{	
	echo"please fill all fields!";
	}
else {
$sql = " UPDATE `product` SET `ItemName`='$itemname',`ItemDescription`='$itemdescription',`QuantityInStock`='$quantity',`Price`='$price',`Category`='$category',`ItemDescription2`='$itemdescription2' WHERE `ProductID` = '" .$productid. "'";
echo "updated successfully";

$result = $con -> query($sql);

}

?>