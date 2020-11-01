<?php
    include('../inc/functions.inc.php');

    
    session_start();

    if (isset($_SESSION['user']) === true && isset($_SESSION['typ']) === true) {
        header("Location: ../index.php");
    }

    $user = htmlspecialchars(strtolower($_POST['user']), ENT_QUOTES);
    $pwd = htmlspecialchars($_POST['pass'], ENT_QUOTES);

    $result = SQL("SELECT * FROM handschlag WHERE name LIKE '$user'");
    
    if ($result->num_rows  === 1) {
        if (password_verify($pwd, sqlReturn($result, 0, "password"))) {
            $result = SQL("SELECT * FROM handschlag WHERE name LIKE '$user'");
            $typ = sqlReturn($result, 0, "typ");
            $_SESSION['user'] = $user;
            $_SESSION['typ'] = $typ;

            header("Location: ../index.php");
        } else {
            header( "Location: index.php");
        }
    } else {
        header( "Location: index.php");
    }
?>
