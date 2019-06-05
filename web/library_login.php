<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!--
 id | userlogin  | passwordhash | firstname | lastname 
----+------------+--------------+-----------+----------
  1 | testAdmin  | password     | Test      | 313
  6 | testAdmin2 | password     | Test2     | 313
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    </head>
    <body>
        <header>
            <h1>Welcome to your Personal Library</h1>
            <h4>Login to Access your Book Shelf</h4>
        </header>
        <main>
            <form method="post" action="library_login.php">
                <input type="text" name="user" placeholder="Enter Username"><br/><br/>
                <input type="password" name="pass" placeholder="Enter Password"><br/><br/>
                <input type="submit" value="Login">
            </form>
            <br/>
            <a href="library_register.php">Don't Have an Account? Register Here.</a>
            <?php
            if (!empty($_POST['user']) and !empty($_POST['pass'])) {
                $username = htmlspecialchars($_POST['user']);
                $password = htmlspecialchars($_POST['pass']);
                
                $stmt = $db->prepare('SELECT u.id, u.userlogin, u.passwordhash, u.firstname, u.lastname
                                      FROM users as u
                                      WHERE userlogin=:username');
                $stmt->execute(array(':username' => "$username"));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (empty($row)) { 
                    echo "<br/><br/>Login Failed<br/>";
                } else if (!empty($row)) {
                    $id = $row['id'];
                    $user = $row['userlogin'];
                    $hashpass = $row['passwordhash'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    
                    if (password_verify($password, $hashpass)) {
                        $_SESSION["userid"] = $id;
                        $_SESSION["user"] = $user;
                        $_SESSION["first"] = $firstname;
                        $_SESSION["last"] = $lastname;
                    }
                    
                    $new_page = "library_shelf.php";
                    header("Location: $new_page");
                    die();
                }
            }
            ?>
        </main>
    </body>
</html>