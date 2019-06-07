<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Info</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <script>
            function bookFormReveal() {
                document.getElementById("book_update").style.display = "block";
            }
            function authorFormReveal() {
                document.getElementById("author_update").style.display = "block";
            }
        </script>
    </head>
    <body>
        <header>
            <div class="col-6">
                <h1>Update Info</h1>
            </div>
            <div class="col-6">
                <h4>
                    <?php
                    echo "Welcome, " . $_SESSION["first"] . " " . $_SESSION["last"] . " " . 
                        "<a href='library_logout.php'>Logout</a>";
                    ?>
                </h4>
                <a href="library_add.php">Add Book to Shelf</a>
            </div>
            <div class="col-12">
                <a href="library_shelf.php">Home</a>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main>
            <form id="book_update" name="book_update" method="post" action="library_update.php" style="display: none">
                <input type="text" name="title" placeholder="Enter Title"><br/><br/>
                <textarea rows="5" cols="50" name="description" placeholder="Enter Description"></textarea><br/><br/>
                <input type="text" name="cover" placeholder="Enter Cover Filename"><br/><br/>
                <input type="text" name="isbn" placeholder="Enter ISBN"><br/><br/>
                <input type="submit" value="Update Book Info">
            </form>
            
            <form id="author_update" name="author_update" method="post" action="library_update.php" style="display: none">
                <input type="text" name="name" placeholder="Enter Author's Name"><br/><br/>
                <textarea rows="5" cols="50" name="bio" placeholder="Enter Author Bio"></textarea><br/><br/>
                <input type="text" name="portrait" placeholder="Enter Portrait Filename"><br/><br/>
                <input type="submit" value="Update Author Info">
            </form>
            <?php
            if (isset($_SESSION['user'])) {
                $userid = $_SESSION["userid"];
                $username = $_SESSION['user'];
            } else {
                header("Location: library_login.php");
                die();
            }
            
            if (isset($_GET['updatebook'])) {
                $bookid = htmlspecialchars($_GET['updatebook']);
                echo "<script> bookFormReveal(); </script>";
            } else if (isset($_GET['updateauthor'])) {
                $authorid = htmlspecialchars($_GET['authorbook']);
                echo "<script> authorFormReveal(); </script>";
            } else {
                // UPDATE queries for the book form
                if (!empty($_POST['title'])) {
                    $title = $_POST['title'];
                    $stmtBook = $db->prepare('UPDATE books SET title=:title WHERE id=:id');
                    $stmtBook->bindValue(':title', $title, PDO::PARAM_STR);
                    $stmtBook->bindValue(':id', $bookid, PDO::PARAM_INT);
                    $stmtBook->execute();
                }
                }
                if (!empty($_POST['description'])) {
                    
                }
                if (!empty($_POST['cover'])) {
                    
                }
                if (!empty($_POST['isbn'])) {
                    $isbn = htmlspecialchars($_POST['isbn']);
                    
                    $stmtBook = $db->prepare('UPDATE books SET isbn=:isbn WHERE id=:id');
                    $stmtBook->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                    $stmtBook->bindValue(':id', $bookid, PDO::PARAM_INT);
                    $stmtBook->execute();
                }

                // UPDATE queries for the author form
                if (!empty($_POST['name'])) {
                    
                }
                if (!empty($_POST['bio'])) {
                    
                }
                if (!empty($_POST['portrait'])) {
                    
                }
                //header("Location: library_shelf.php");
                //die();
            }
            ?>
        </main>
    </body>
</html>