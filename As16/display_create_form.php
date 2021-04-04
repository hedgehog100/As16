<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang='en-US'>
    <head>
        <title>display_users</title>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    
    <body>
        <h1 class='text-center'>Create User/Admin</h1><br><br>
        
        <div class='container col-3 align-items-center'>
            <form method='post' action='insert_record.php'>
                <label for='email'>email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='email' type='email' id='email' required><br/>
                
                <label for='password'>password:&nbsp;</label>
                <input name='password' type='password' id='password' required><br/>
                
                <label for='firstname'>First name:</label>
                <input name='firstname' type='text' id='firstname' required><br/>
                
                <label for='lastname'>Last name:</label>
                <input name='lastname' type='text' id='lastname' required><br/>
                
                <label for='phone'>phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='phone' type='text' id='phone' required><br/>
                
                <label for='address'>address:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='address' type='text' id='address' required><br/>
                
                <label for='address2'>address2:&nbsp;&nbsp;</label>
                <input name='address2' type='text' id='address2'><br/>
                
                <label for='city'>city:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='city' type='text' id='city' required><br/>
                
                <label for='state'>state:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='state' type='text' id='state' required><br/>
                
                <label for='zip_code'>zip code:&nbsp;&nbsp;&nbsp;</label>
                <input name='zip_code' type='text' id='zip_code' required><br/><br/>
                
                <select style='position:relative; left:30%;' name='role'>
                    <option value='User'>User</option>
                    <option value='Admin'>Admin</option>
                </select><br/><br/>
                
                <input class='col-9' type='submit' value='submit'>
                
            </form>
        </div>
    </body>
</html>
