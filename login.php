<?php
if(isset ($_POST['email_']) and isset ($_POST['password_'])){
    $email_ = $_POST['email_'];
    $password_ = $_POST['password_'];
    $input = explode(",", file_get_contents("data.txt"));

    if(strcmp($email_, $input[0]) == 0 and strcmp($password_, $input[1]) == 0){
        echo "User found.";
    }else{
        echo "Credenciais diferentes!";
    }
}else{
    echo "Usuário ou senha vazio!";
}

?>