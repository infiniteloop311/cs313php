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
            <h3>Login to Access your Book Shelf</h3>
            <form method="post" action="library_login.php">
                <input type="text" name="user" placeholder="Enter Username"><br/>
                <input type="password" name="pass" placeholder="Enter Password"><br/>
                <input type="submit" value="Login"><br/>
            </form>
            <?php
            if (!empty($_POST['user']) and !empty($_POST['pass'])) {
                $username = htmlspecialchars($_POST['user']);
                $password = htmlspecialchars($_POST['pass']);
                
                $stmt = $db->prepare('SELECT u.id, u.userlogin, u.passwordhash, u.firstname, u.lastname
                                      FROM users as u
                                      WHERE userlogin=:username AND passwordhash=:password');
                $stmt->execute(array(':username' => "$username", ':password' => "$password"));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (empty($rows)) { 
                    echo "Login Failed<br/>";
                } else if (!empty($rows)) {
                    foreach ($rows as $row) {
                        $id = $row['id'];
                        $user = $row['userlogin'];
                        $pass = $row['passwordhash'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $_SESSION["userid"] = $id;
                        $_SESSION["user"] = $user;
                        $_SESSION["pass"] = $pass;
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