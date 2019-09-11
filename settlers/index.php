<?php
    session_start();

    if(isset($_SESSION['isLogged']) && ($_SESSION['isLogged']==true)) {
        header('Location: game.php');
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
    <h2>Welcome to Settlers!</h2>
    <form action="login.php" method="post">
        <label>Login</label><br/>
        <input type="text" name="login"/><br/>
        <label>Password</label><br/>
        <input type="password" name="password"/><br/><br/>
        <input type="submit" name="Log In" />
    </form>
    <?php
        if(isset($_SESSION['error']))  echo $_SESSION['error'];
    ?>
</body>
</html>