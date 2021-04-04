<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

# connect
require '../database/database.php';
$pdo = Database::connect();

# put the information for the chosen record into variable $results 
$id = $_SESSION['id'];
$sql = "DELETE FROM persons WHERE id=?";
$query=$pdo->prepare($sql);
$query->execute(Array($id));
$result = $query->fetch();

?>

<!DOCTYPE html>
<html lang='en-US'>
    <head>
        <title>display_users</title>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    
    <body>
        <div class="text-center">
            <h1>User was deleted</h1>
            <form method='post' action='display_list.php'><br/><br/>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>    