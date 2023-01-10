<?php
session_start();

$email = $_POST["email"];
$pwd = $_POST["password"];

$Message = "<h3 style='color:red'>Invalid Login Credentials</h3>";

// To Do 1 (Practical 2): Validate login credentials with database
include_once("mysql_conn.php");

$qry = "SELECT * FROM Shopper";
$result = $conn->query($qry);

while($row = $result->fetch_array()){
	if($email == $row["Email"] && password_verify($pwd , $row["Password"])){
		$_SESSION["ShopperName"] = $row["Name"];
		$_SESSION["ShopperID"] = $row["ShopperID"];
		$Message = "<h3>Hello</h3>";
	}
}

$qry = "SELECT sc.ShopCartID AS ShopCartID, COUNT(sci.ProductID) AS NumItems FROM ShopCart sc LEFT JOIN ShopCartItem sci on sc.ShopCartID = sci.ShopCartID WHERE sc.OrderPlaced = 0 AND sc.ShopperID = ?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("i", $_SESSION["ShopperID"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();

if ($result->num_rows > 0) {
	while ($row = $result->fetch_array()) {
		$_SESSION["Cart"] = $row["ShopCartID"];
		$_SESSION["NumCartItem"] = $row["NumItems"];
	}
}

include("header.php"); 	
echo $Message;
include("footer.php");
?>