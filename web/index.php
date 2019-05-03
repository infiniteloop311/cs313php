<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="02prove.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="02prove.js"></script>
</head>
<body>
    <div id="header">
        <h1>My Home Page</h1>
        <a href="assignments.php">Assignments</a><br/>
        <img src="02banner.jpg" alt="Scenery banner" id="banner">
    </div>
    <div>
        <img src="acmilan.png" alt="ac_milan_logo" id="logo">
        <p>
            My name is Jay Fagerburg and I am a Computer Engineering major. This is my second to last semester here at BYUI. I am from Columbia, South Carolina. I enjoy reading fiction and historical fiction, listening to music, playing video games with my older brother and by myself, practicing soccer, and playing the piano. 
        </p>
        <p>
            I took Web Engineering I last semester because I wanted to get some experience with web development and as it turns out I really enjoyed it. Since I don't have a lot of space my last semester, I'm taking this class now so that I can delve deeper into web development server side programming. I'm hoping that it'll be as fun as the prerequisite class and that I'll learn a lot. 
        </p>
    </div>
    <button id="tbutton">Click here for some inspirational quotes!</button><br/>
    <div id="quotes">
        <q>
            I am a slow walker, but I never walk back. - Abraham Lincoln
        </q>
        <br/><br/>
        <q>
            Keep your eyes on the stars, and your feet on the ground. - Theodore Roosevelt
        </q>
        <br/><br/>
        <q>
            To say that nothing is true is to realize that the foundations of society are fragile and that we must be the shepherds of our civilization. To say that everything is permitted is to understand that we are the architects of our actions, and that we must live with their consequences, whether glorious or tragic. - Anonymous
        </q>
    </div>
    <br/><br/>
    <?php 
    $file = fopen("test.txt","r");
    
    while(! feof($file))
    {
        echo fgets($file). "<br/>";
    }
    
    fclose($file);
    
    echo date("D M d, Y G:i a"); 
    ?>
</body>
</html>