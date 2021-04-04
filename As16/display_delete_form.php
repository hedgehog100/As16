<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

# connect
require '../database/database.php';
$pdo = Database::connect();

# put the information for the chosen record into variable $results 
$id = $_GET['id'];
$_SESSION['id'] = $id;
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
$_GET['id'] = $result['id'];
echo $result['id'];
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        </head>
        
        <body>
            <div class='container text-center'>
                <br/><br/><br/>
                <h1>Are you sure you want to delete <?php echo $result['fname'] . "  " . $result['lname'];?></h1>
                <br/>
             
                <div class='form-group'>
                <form method='post' action='delete_user.php'>
                    <input type="submit" value="Confirm">
                </form><br/>
                <form method='post' action='display_list.php'>
                    <input type="submit" value="Cancel">
                </form>
                </div>
            </div>
        </body>
</html>
