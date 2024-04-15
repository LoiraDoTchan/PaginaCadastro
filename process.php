<?php

if(isset ($_POST['email']) and isset ($_POST['password']) and isset ($_POST['passconf'])){
    $password = $_POST['password'];
    $email= $_POST['email'];
    $passconf = $_POST['passconf'];
    if(strcmp($password, $passconf) == 0){
        echo "Cadastro realizado!";
        $output = array($email, $password);
        file_put_contents('data.txt', implode(",", $output));
    }else{
        echo "Erro, senhas diferentes!";
    }
}

if(isset ($_POST['email_']) and isset ($_POST['password_'])){
    $email_ = $_POST['email_'];
    $password_ = $_POST['password_'];
    $input = explode(",", file_get_contents("data.txt"));

    if(strcmp($email_, $input[0]) == 0 and strcmp($password_, $input[1]) == 0){
        echo "User found.";
    }else{
        echo "Credenciais diferentes!";
    }
}
?>