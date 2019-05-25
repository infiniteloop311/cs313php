<?php
require "dbConnect.php";
$db = getDB();

if (isset($_GET['author_id']))
{
    $id = $_GET['author_id'];

    foreach ($db->query("SELECT * FROM authorsinfo WHERE id='$id'") as $row)
    {
        $portrait = $row['portrait'];
        echo "<img src=\"$portrait\" alt=$portrait><br/>" . $row['name'] . 
            "<br/><br/>" . $row['bio'];
    }
}
?>