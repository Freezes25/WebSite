<?php
require_once "header.php";
?>
<section class="auth">
    <form action="server/register.php" method="POST">
        <input type="text" placeholder="Введите логин" name="login">
        <input type="email" placeholder="Введите email" name="email">
        <input type="password" placeholder="Введите пароль" name="password">
        <input type="password" placeholder="Введите пароль повторно" name="repeatPassword">
        <button class="auth" type="submit">Зарегистрироваться</button>
        <a href="auth.php">Авторизоваться</a>
    </form>
</section>