<?php 
require_once "config/db.php";
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$errorField = [];
$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
$query = connect()->query($sql);

if($login == ''){
    $errorField[] = 'login';
}
if($email == ''){
    $errorField[] = 'email';
}
if($password == '' && strlen($password) <= 6){
    $errorField[] = 'password';
}
if($repeatPassword == '' && strlen($repeatPassword) < 6){
    $errorField[] = 'password';
}
if($query->rowCount() > 0){
    $errorField[] = 'login';
}

if(!empty($errorField)){
    $errormessage;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errormessage = 'Имаил введен не верно';
    }
    else if($query->rowCount() > 0){
        $errormessage = 'Введеный логин уже существует';
    }else{
        $errormessage = 'Проверьте правильность полей';
    }
    $response = [
        'status'=>false,
        'error'=>$errorField,
        'type'=>1,
        'message'=>$errormessage
    ];

    echo json_encode($response);

    die();
}



if($password == $repeatPassword){
    $password = md5(md5($password));
    $response = ['status'=>true];
    json_encode($response);   
    $sql = 'INSERT INTO `users` (`login`, `password`, `email`) VALUES (:login, :password, :email)';
    $query = connect()->prepare($sql);
    $query->execute([
        'login'=>$login,
        'password'=>$password,
        'email'=>$email
    ]);    
    header('Location: ../auth.php');
}

else{
    $errorField[] = 'password';
    $errorField[] = 'repeatPassword';
    $response = [
        'status'=>false,
        'error'=>$errorField,
        'type'=>1,
        'message'=>'Пароли не совпадают'
    ];
    header('Location: /register.php');
}