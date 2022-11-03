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
	if($email == $row["Email"] && $pwd == $row["Password"]){
		$_SESSION["ShopperName"] = $row["Name"];
		$_SESSION["ShopperID"] = $row["ShopperID"];
		$Message = "<h3>Hello</h3>";
	}
}

$conn->close();

include("header.php"); 	
echo $Message;
include("footer.php");
?>