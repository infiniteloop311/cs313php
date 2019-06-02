<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register for Your Shelf</title>
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
            <h1>Registration</h1>
        </header>
        <main>
            <h4>Fill out the form below to register</h4><br/>
            <form method="post" action="library_register.php">
                <input type="text" name="first" placeholder="Enter Firstname"><br/><br/>
                <input type="text" name="last" placeholder="Enter Lastname"><br/><br/>
                <input type="text" name="user" placeholder="Enter Username"><br/><br/>
                <input type="password" name="pass" placeholder="Enter Password"><br/><br/>
                <input type="submit" value="Register">
            </form>
            <?php
            if (!empty($_POST['user']) and 
                !empty($_POST['pass']) and 
                !empty($_POST['first']) and 
                !empty($_POST['last'])) {
                $username = htmlspecialchars($_POST['user']);
                $password = htmlspecialchars($_POST['pass']);
                $firstname = htmlspecialchars($_POST['first']);
                $lastname = htmlspecialchars($_POST['last']);
                
                $stmt = $db->prepare('SELECT u.id, u.userlogin, u.passwordhash, u.firstname, u.lastname
                                      FROM users as u
                                      WHERE userlogin=:username');
                $stmt->execute(array(':username' => "$username"));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if(!empty($rows))
                    echo "Username already exists!<br/>";
                else if (empty($rows)) {
                    $stmt2 = $db->prepare('INSERT INTO users(userlogin, passwordhash, firstname, lastname) 
                                          VALUES (:user, :pass, :first, :last);');
                    $stmt2->execute(array(':user' => "$username", ':pass' => "$password", ':first' => "$firstname", ':last' => "$lastname"));
                    $newId = $db->lastInsertId();
                    
                    $_SESSION["userid"] = $newId;
                    $_SESSION["user"] = $username;
                    $_SESSION["pass"] = $password;
                    $_SESSION["first"] = $firstname;
                    $_SESSION["last"] = $lastname;
                    
                    $new_page = "library_shelf.php";
                    header("Location: $new_page");
                    die();
                }
            }
            ?>
        </main>
    </body>
</html>