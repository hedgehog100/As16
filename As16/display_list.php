<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
# connect
require '../database/database.php';
$pdo = Database::connect();
    
    $sql = "SELECT * FROM persons WHERE email= ?";
    $query=$pdo->prepare($sql);
    $query->execute(Array($_SESSION['username']));
    $result = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
    <html lang='en-US'>
        <head>
            <title>display_users</title>
            <meta charset='utf-8' />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        </head>
        
        <body>
            <h1 class='text-center'>User List</h1><br><br>
            <table class='table'>
                <thead>
                    <th scope='col'>Last name</th>
                    <th scope='col'>First name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Role</th>
                    <th scope='col'>Actions</th>
                </thead>
                <tbody>
                    <?php
                    # display all records
                   
                    
                    $sql = 'SELECT * FROM persons';
                    foreach ($pdo->query($sql) as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['lname'] . "</td>";
                        echo "<td>" . $row['fname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td> <a href='display_read_form.php?id=" . $row['id'] . "'>Read   </a>";
                        if($_SESSION['username'] == $row['email'] || $result['role'] == "Admin"){
                    	   echo "<a href='display_update_form.php?id=" . $row['id'] . "'>Update   </a> ";
                    	}
                    	
                    	if($result['role'] == "Admin"){
                    	   echo "<a href='display_delete_form.php?id=" . $row['id'] . "'>Delete</a>";
                    	}
                    	
                    	echo "</td>";
                        
                        echo "</tr>";
                    	
                    }
                    ?>
            </tbody>
        </table>
      <br />
      <div class="text-center">
      <?php
         # display link to "create" form
         
         if($result['role']=='Admin'){
            echo " <a class='btn btn-primary' href='display_create_form.php'>Create</a>";
         }
        
        echo " <a class='btn btn-secondary' href='logout.php'>Logout</a><br><br>";// style='color:red;'
        ?>
        </div>
    </body>
</html>
