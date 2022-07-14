<?php
require_once "header.php";
require_once "server/config/db.php";
session_start();
if(array_key_exists('user',$_SESSION)){
    header('Location: /');
}
?>
<section class="auth">
    <form action="server/auth.php" method="POST" id="formAuth">
        <input type="text" placeholder="Введите логин" name="login">
        <input type="password" placeholder="Введите пароль" name="password">
        <button class="auth" type="submit">Войти</button>
        <a href="register.php">Зарегистрироваться</a>
    </form>
</section>


<script src = "js/sctipt.js"></script>
</body>

</html>
