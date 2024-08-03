<?php
$email = NULL;
$senha = NULL;
if(isset ($_POST['email']) and isset ($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo nl2br("Connected successfully\n");
        $sql = "USE Usuario";

        if ($conn->query($sql) === TRUE) {
            echo nl2br("Used db usuario successfully\n");
            //checar se acha o login na tabela Registro dentro do db.
            //se achar linkar à página de controle do usuário
            //se não achar falar que o usuário ou senha estão diferentes
        }
}else if($email != NULL && $senha != NULL){ //account management

    //button selection
     if (isset($_POST['btnDeleteAccount'])) {
    // deletarconta
     } else if (isset($_POST['btnChange'])){
    // mudar credenciais
    //só mudar o que tiver setado
    //se não tiver nada setado -> dar erro;
    }
}else{
    echo "Email ou senha vazio!";
}

?>