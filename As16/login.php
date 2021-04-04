<?php
    session_start();
    
    $errMsg='';
    
    //if login.php is called using submit button, check user input
    if(isset($_POST['login'])
        && !empty($_POST['username'])
        && !empty($_POST['password'])){
            
        $_POST['username'] = htmlspecialchars($_POST['username']);
        $_POST['password'] = htmlspecialchars($_POST['password']);
            
        //check 'back door' login
        if($_POST['username'] == 'admin@admin.com'
           && $_POST['password'] == 'admin'){
                $_SESSION['username'] ='admin@admin.com';
                
                header("Location: display_list.php");
        }else{
            #check database
            require '../database/database.php';
            $pdo = Database::connect();
            $sql = "SELECT * FROM persons "
			. " WHERE email= ?"
			//. " AND password_hash= ?"
			. " LIMIT 1";
			
			$query=$pdo->prepare($sql);
			$query->execute(Array($_POST['username']));
			$result = $query->fetch(PDO::FETCH_ASSOC);
            
            $password_hash = $result['password_hash'];
            $password_salt = $result['password_salt'];
            
            $password = htmlspecialchars($_POST['password']);
            if($result && $password_hash == MD5($password . $password_salt)){
                $_SESSION['username'] = $result['email'];
                header('location: display_list.php');  //redirect
            }else{
               // echo "wrong username and password";
               $errMsg = 'Login failure: wrong username or password';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>As 16</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <style>
            #centerDiv{
                position:absolute;
                left:37%;
                width:20%;
            }
            
            h1, h2{
                position:relative;
                left:31%;
            }
        </style>
    </head>
    
    <body>
        <div class = "container" id="centerDiv">
        <h1>As 16</h1>
        <h2>Login</h2><br/>
        
        <form acion="" method="post">
            
            <input type="text" class="form-control"
                name="username" placeholder="admin@admin.com"
                required autofocus /> <br/>
            <input type="password" class="form-control"
                name="password" placeholder="admin" required /><br/>
            <button class="btn btn-lg btn-primary btn-block"
                type="submit" name="login">Login</button>
            <button class="btn btn-lg btn-secondary btn-block"
                onClick="window.location.href = 'register.php';";
                type="button" name="join">join</button>
            
                
                 <p style="color:red;"><?php echo $errMsg; ?></p>
                 
        </form>
        
            <br/><br/><br/><br/><br/><br/>
            <h3 class="text-center">Git hub link</h3>
            <a class="text-center" href="https://github.com/hedgehog100/As16.git">https://github.com/hedgehog100/As16.git</a>
        </div>
    </body>
    
</html>
