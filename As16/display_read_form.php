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
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
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
        <h1 class='text-center'>Read User</h1><br><br>
        
        <div class='container col-3 align-items-center'>
            <form method='post' action='display_list.php'>
                <label for='email'>email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='email' type='email' id='email' value='<?php echo $result['email']; ?>' disabled><br/>
                
                <label for='firstname'>First name:</label>
                <input name='firstname' type='text' id='firstname' value='<?php echo $result['fname']; ?>' disabled><br/>
                
                <label for='lastname'>Last name:</label>
                <input name='lastname' type='text' id='lastname' value='<?php echo $result['lname']; ?>' disabled><br/>
                
                <label for='phone'>phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='phone' type='text' id='phone' value='<?php echo $result['phone']; ?>' disabled><br/>
                
                <label for='address'>address:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='address' type='text' id='address' value='<?php echo $result['address']; ?>' disabled><br/>
                
                <label for='address2'>address2:&nbsp;&nbsp;</label>
                <input name='address2' type='text' id='address2'value='<?php echo $result['address2']; ?>' disabled><br/>
                
                <label for='city'>city:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='city' type='text' id='city' value='<?php echo $result['city']; ?>' disabled><br/>
                
                <label for='state'>state:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='state' type='text' id='state' value='<?php echo $result['state']; ?>' disabled><br/>
                
                <label for='zip_code'>zip code:&nbsp;&nbsp;&nbsp;</label>
                <input name='zip_code' type='text' id='zip_code' value='<?php echo $result['zip_code']; ?>'disabled><br/><br/>

                <input class='col-9' type='submit' value='submit'>

                
            </form>
        </div>
    </body>
</html>

