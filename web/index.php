<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="02prove.css">
</head>
<body>
    <div id="header">
        <h1>My Home Page</h1>
        <a href="assignments.php">Assignments</a>
        <img src="02banner.jpg" alt="Scenery banner" id="banner">
    </div>
    <div>
        <p>
            My name is Jay Fagerburg and I am a Computer Engineering major. This is my second to last semester here at BYUI. I am from Columbia, South Carolina. I enjoy reading fiction and historical fiction, listening to music, playing video games with my older brother and by myself, practicing soccer, and playing the piano. 
        </p>
        <p>
            I took Web Engineering I last semester because I wanted to get some experience with web development and as it turns out I really enjoyed it. Since I don't have a lot of space my last semester, I'm taking this class now so that I can delve deeper into web development server side programming. I'm hoping that it'll be as fun as the prerequisite class and that I'll learn a lot. 
        </p>
        <?php echo date("D M d, Y G:i a"); ?>
        <br/>
    </div>
</body>
</html>