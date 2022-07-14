<?php 
require_once "server/config/db.php"

?>

<!DOCTYPE html>
<html lang="all">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">

        <div class="container">
            <div class="header__inner">
                <div class="logo"><a href="/">Test</a></div>
                <nav class="nav">
                    <ul class="list__menu">
                        <li class="link__menu"><a href="flight.php">Рейсы</a></li>
                        <li class="link__menu"><a href="deal.php">Забронировать</a></li>
                        <li class="link__menu"><a href="#">О компании</a></li>
                        <!-- <li class="link__menu"><a href="#"></a></li>
                        <li class="link__menu"><a href="#">Forum</a></li> -->
                    </ul>
                </nav>

                <div class="login">
                    
                    <?php require_once "header.php";
                        session_start();
                        if(array_key_exists('user',$_SESSION)){
                            echo '<div class="auth"><a href="exit.php">Выйти</a></div>';
                        }else{
                            echo '<div class="auth"><a href="auth.php">Войти</a></div>';
                        }
                    ?>
                </div>
            </div>
        </div>

    </header>
