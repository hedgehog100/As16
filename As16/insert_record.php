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
$role = $_POST['role'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip_code'];

$role = htmlspecialchars($role);
$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);
$password = htmlspecialchars($password);
$address = htmlspecialchars($address);
$address2 = htmlspecialchars($address2);
$city = htmlspecialchars($city);
$state = htmlspecialchars($state);
$zipcode = htmlspecialchars($zipcode);

if($role==''){
    $role='User';
}



# 3. assign MySQL query code to a variable
$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$query=$pdo->prepare($sql);
$query->execute(Array($role, $fname, $lname, $email, $phone, $password, $password, $address, $address2, $city, $state, $zipcode));
$result = $query->fetch(PDO::FETCH_ASSOC);

# 4. insert the message into the database
//$pdo->query($sql); # execute the query
echo "<p>The user has been added</p><br>";
echo "<a href='display_list.php'>Back to list</a>";