<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Register</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        
        <style>
            #cancel, #submit {
                display:block;
            }
            #centerDiv{
                position:absolute;
                left:35%;
            }
          
        </style>
    </head>
        
    <body>
        <div class="container" id="centerDiv">
        <h1>Register New User</h1>
        <form method="post" action="insert_new_user.php">
            <div class="form-group">
                <div class="form-group">
                    <label for="email">email:</label>
                    <input name="email" placeholder="email" class="form-control col-4" id="email" type="email" required>
                </div>
                
                <div class="form-group">
                    <label for="usernameInput">password:</label>
                    <input name="password" class="form-control col-4" id="passwordInput" type="password" required>
                    <span class="help-block">Password must be at least 16 characters long with
                                             at least <br> one of each: lower, upper, number, and 
                                             special character</span>
                </div>
                
                <div class="form-group">
                    <label for="confirmPasswordInput">confirm password:</label>
                    <input name="confirmPassword" class="form-control col-4" id="confirmPasswordInput" type="password" required>
                </div>
                
                <div class="form-group">
                <label for='firstname'>First name:</label>
                <input name='firstname' placeholder="First name" class="form-control col-4" type='text' id='firstname' required><br/>
                </div>
                
                <div class="form-group">
                <label for='lastname'>Last name:</label>
                <input name='lastname' placeholder="Last name" class="form-control col-4" type='text' id='lastname' required><br/>
                </div>
                
                <div class="form-group">
                <label for='phone'>phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='phone' placeholder="phone" class="form-control col-4" type='text' id='phone' required><br/>
                </div>
                
                <div class="form-group">
                <label for='address'>address:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='address' placeholder="address" class="form-control col-4" type='text' id='address' required><br/>
                </div>
                
                <div class="form-group">
                <label for='address2'>address2:&nbsp;&nbsp;</label>
                <input name='address2' class="form-control col-4" type='text' id='address2'><br/>
                </div>
                
                <div class="form-group">
                <label for='city'>city:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='city' placeholder="city" class="form-control col-4" type='text' id='city' required><br/>
                </div>
                
                <div class="form-group">
                <label for='state'>state:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name='state' placeholder="state" class="form-control col-4" type='text' id='state' required><br/>
                </div>
                
                <div class="form-group">
                <label for='zip_code'>zip code:&nbsp;&nbsp;&nbsp;</label>
                <input name='zip_code' placeholder="zip_code" class="form-control col-4" type='text' id='zip_code' required><br/>
                </div>
            </div>
            
            <div class="form-group" id="buttons">
                <input class="btn btn-primary btn-block col-4" type="submit" name="register" id="register" value="register">
                <button onClick='window.location.href = "login.php";';
                        type="button" class="btn btn-secondary btn-block col-4" id="cancel" name="cancel">cancel</button>
                
            </div>
        </form>
        </div>
    </body>
</html>