<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
# This process inserts a record. There is no display.

# 1. connect to database
require '../database/database.php';
$pdo = Database::connect();

# 2. assign user info to a variable
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip_code'];

$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);
$address = htmlspecialchars($address);
$address2 = htmlspecialchars($address2);
$city = htmlspecialchars($city);
$state = htmlspecialchars($state);
$zipcode = htmlspecialchars($zipcode);

$id=$_SESSION['id'];
echo $id;

# 3. assign MySQL query code to a variable
$sql = "UPDATE persons SET fname= ?, lname= ?, email= ?, phone= ?, address= ?, address2= ?, city= ?, state= ?, zip_code= ?  WHERE id= ?";

$query=$pdo->prepare($sql);
$query->execute(Array($fname, $lname, $email, $phone, $address, $address2, $city, $state, $zipcode, $id));
$result = $query->fetch(PDO::FETCH_ASSOC);

# 4. insert the message into the database
//$pdo->query($sql); # execute the query
echo "<p>The user has been updated</p><br>";
echo "<a href='display_list.php'>Back to list</a>";