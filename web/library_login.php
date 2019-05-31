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
                <input type="text" name="user" placeholder="Enter Username"><br/>
                <input type="password" name="pass" placeholder="Enter Password"><br/>
                <input type="submit" value="Login">
            </form>
            <?php
            if (isset($_POST['user']) and isset($_POST['pass'])) {
                $username = $_POST['user'];
                $password = $_POST['pass'];
                $stmt = $db->prepare('SELECT u.id, u.userlogin, u.passwordhash, u.firstname, u.lastname
                                      FROM users as u
                                      WHERE userlogin=:username AND passwordhash=:password');
                $stmt->execute(array(':username' => "$username", ':password' => "$password"));
                echo "$username<br/>$password";
            }
            ?>
        </main>
    </body>
</html>