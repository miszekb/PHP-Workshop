<?php
    session_start();
    if(!isset($_SESSION['isLogged'])) {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Settlers - browser game</title>
    </head>
    <body>
        <?php
            echo "<p>Hello ".$_SESSION['user'].'! [ <a href="logout.php">Log out</a> ]</p>';
            echo "<p><b>Wood</b>: ".$_SESSION['wood'];
            echo " | <b>Stone</b>: ".$_SESSION['stone'];
            echo " | <b>Wheat</b>: ".$_SESSION['wheat']."</p>";
            
            echo "<p><b>E-mail</b>: ".$_SESSION['email'];
            echo "<br /><b>Premium days left</b>: ".$_SESSION['premiumDays']."</p>";
        ?>
    </body>
</html>