<?php
function redirect($url) {
    header('Location: '.$url);
    die();
}
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
            $sql = "select * from Registro where email  = '$email' and senha = '$senha'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                //se achar linkar à página de controle do usuário
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                redirect("account.html");
            }else{
                echo nl2br("Usuário ou senha estão diferentes\n");
            }
            
        }
}

?>