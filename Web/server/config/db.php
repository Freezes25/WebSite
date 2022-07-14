<?php

    function connect(){
        $dsn = 'mysql:host=localhost;dbname=main';
        $login = 'root';
        $password = '';
        $pdo = new PDO($dsn,$login,$password);
        return $pdo;

    }


function query($sql){
    $sh = connect()->prepare($sql);
    $sh->execute();

    $result = $sh->fetchAll(PDO::FETCH_ASSOC);

    if($result == null){
        return [];
    }
    return $result;
    
}