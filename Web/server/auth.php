<?php 
require_once "config/db.php";
session_start();
if(array_key_exists('user',$_SESSION)){
    header('Location: /');
}

$login = $_POST['login'];
$password = $_POST['password'];



if($login == ''){
    $errorField[] = 'login';
}

if($password == ''){
    $errorField[] = 'password';
}

if(!empty($errorField)){
    $errormessage;
    if($query->rowCount() > 0){
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
    header('Location: ../auth.php');
    die();

}

$password = md5(md5($password));
$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
$sql = connect()->query($sql);






if($sql->rowCount() > 0){
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['user'] = [
        'login'=>$users['login'],
        'id'=>$users['id'],
        'email'=>$users['email']
    ];
    $response = ['status'=>true];
}
else{
    $errorField[] = 'login';
    $errorField[] = 'password';
    $errormessage = 'Логин или пароль не верен';
    $response = [
        'status'=>false,
        'error'=>$errorField,
        'type'=>1,
        'message'=>$errormessage
    ];
    json_encode($response);
    header('Location: ../auth.php');
}
