<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
    
$new_page = "library_login.php";
header("Location: $new_page");
die();
?>
    
</body>
</html> 