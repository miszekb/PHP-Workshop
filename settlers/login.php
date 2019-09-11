<?php
    session_start();
    require_once "connect.php";

    if(!isset($_POST['login']) || !isset($_POST['password'])) {
        header('Location: index.php');
        exit();
    }

    $connection = @new mysqli($host, $dbUser, $dbPassword, $dbName);
    if ($connection->connect_errno != 0) {
        echo "Error".$connection->connect_errno;
    }
    else {
        $login = $_POST["login"];
        $password = $_POST["password"];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        
        if ($result = @$connection->query(
            sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
            mysqli_real_escape_string($connection,$login),
            mysqli_real_escape_string($connection,$password)))){

            $usersNumber = $result->num_rows;

            if($usersNumber > 0) {
                $_SESSION['isLogged'] = true;
                $_SESSION['ID'] = $row['id'];
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['user'];
                $_SESSION['wood'] = $row['drewno'];
                $_SESSION['stone'] = $row['kamien'];
                $_SESSION['wheat'] = $row['zboze'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['premiumDays'] = $row['dnipremium'];
                
                unset($_SESSION['error']);
                $result->free_result();
                header('Location: game.php');
            }
            else {
                $_SESSION['error'] = '<span style="color:red">Incorrect login or password</span>';
                header('Location: index.php');
            }
        }

        $connection->close();
    }
?>