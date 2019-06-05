<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add to My Shelf</title>
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
            <div class="col-6">
                <h1>Add to Your BookShelf</h1>
            </div>
            <div class="col-6">
                <h4>
                    <?php
                    echo "Welcome, " . $_SESSION["first"] . " " . $_SESSION["last"] . " " . 
                        "<a href='library_logout.php'>Logout</a>";
                    ?>
                </h4>
                <a href="library_add.php" style="visibility: hidden">Add Book to Shelf</a>
            </div>
            <div class="col-12">
                <a href="library_shelf.php">Home</a>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main>
            <form method="post" action="library_add.php">
                <h5>Enter Book Details:</h5><br/>
                <input type="text" name="title" placeholder="Enter Title"><br/><br/>
                <textarea rows="5" cols="50" name="description" placeholder="Enter Description"></textarea><br/><br/>
                <input type="text" name="cover" placeholder="Enter Cover Filename"><br/><br/>
                <input type="text" name="isbn" placeholder="Enter ISBN"><br/><br/>
                <h5>Enter Author Details:</h5><br/>
                <input type="text" name="name" placeholder="Enter Author's Name"><br/><br/>
                <textarea rows="5" cols="50" name="bio" placeholder="Enter Author Bio"></textarea><br/><br/>
                <input type="text" name="portrait" placeholder="Enter Portrait Filename"><br/><br/>
                <input type="submit" value="Add Book">
            </form>
            <?php
            if (isset($_SESSION['user'])) {
                $id = $_SESSION["userid"];
                $username = $_SESSION['user'];
            } else {
                header("Location: library_login.php");
                die();
            }
            
            if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['cover']) and !empty($_POST['isbn']) and 
                !empty($_POST['name']) and !empty($_POST['bio']) and !empty($_POST['portrait'])) {
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                $cover = htmlspecialchars($_POST['cover']);
                $isbn = htmlspecialchars($_POST['isbn']);
                $name = htmlspecialchars($_POST['name']);
                $bio = htmlspecialchars($_POST['bio']);
                $portrait = htmlspecialchars($_POST['portrait']);
                $currentUser = $_SESSION["userid"];
                echo "$title<br/>$description<br/>$cover<br/>$isbn<br/>$name<br/>$bio<br/>$portrait<br/>";
                echo $currentUser;
                
                $stmtBook = $db->prepare('INSERT INTO books(title, description, isbn, cover) VALUES (:title, :des, :isbn, :cover);');
                $stmtBook->execute(array(':title' => "$title", ':des' => "$description", ':isbn' => "$isbn", ':cover' => "$cover"));
                $bookId = $db->lastInsertId();
                
                $stmtSearch = $db->prepare('SELECT a.id, a.name FROM authorsinfo AS a WHERE name=:nameA');
                $stmtSearch->execute(array(':nameA' => $name));
                $rows = $stmtSearch->fetchAll(PDO::FETCH_ASSOC);
                $authorId = NULL;
                
                if (empty($rows)) {
                    $stmtAuthor = $db->prepare('INSERT INTO authorsinfo(name, bio, portrait) VALUES (:name, :bio, :portrait);');
                    $stmtAuthor->execute(array(':name' => "$name", ':bio' => "$bio", ':portrait' => "$portrait"));
                    $authorId = $db->lastInsertId();
                } else if (!empty($rows)) {
                    foreach ($rows as $row) {
                        $authorId = $row['id'];
                    }
                }
                
                $stmtBook = $db->prepare('INSERT INTO shelf(user_id, book_id, author_id) VALUES (:user, :book, :author);');
                $stmtBook->execute(array(':user' => "$currentUser", ':book' => "$bookId", ':author' => "$authorId"));
                
                $new_page = "library_shelf.php";
                header("Location: $new_page");
                die();
            } else {
                echo "<br/>Please fill in all the fields!";
            }
            ?>
        </main>
    </body>
</html>