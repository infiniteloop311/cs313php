<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!--
id | userlogin | passwordhash | firstname | lastname 
----+-----------+--------------+-----------+----------
  1 | testAdmin | password     | Test      | 313
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Welcome to your Personal Library</h1>
        </header>
        <main>
            <h3>Login to Access your Shelf</h3>
            <form method="post" action="library_login.php">
                <input type="text" name="username" placeholder="Enter Username"><br/>
                <input type="text" name="password" placeholder="Enter Password"><br/>
                <input type="submit" value="Login">
            </form>
            <?php
            if (isset($_POST['username']) and isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $stmt = $db->prepare('SELECT users.id as id, users.userlogin as user, users.passwordhash as pass, 
                                             users.firstname as first, users.lastname as last
                                      FROM users as u
                                      WHERE user=:username AND pass=:password');
                $stmt->execute(array(':username' => "$username", ':password' => "$password"));
                echo "Test";
            }
            ?>
        </main>
    </body>
</html>