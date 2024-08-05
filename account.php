<?php 
//account management
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    //grab from sign-in.html
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $action = $_POST['action'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo nl2br("Connected successfully\n");
    $sql = "USE Usuario";

    if ($conn->query($sql) === TRUE){
        switch ($action) {
            case 'Mudar credenciais':
                if(isset ($_POST['newName'])){
                    $newName = $_POST['newName'];
                    $sql = "UPDATE Registro SET nome ='$newName' WHERE email = '$email'";
                    if ($conn->query($sql) === TRUE){
                        echo nl2br("Nome da conta alterado\n");
                    }else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                if(isset ($_POST['newSurname'])){
                    $newSurname = $_POST['newSurname'];
                    $sql = "UPDATE Registro SET sobrenome ='$newSurname' WHERE email = '$email'";
                    if ($conn->query($sql) === TRUE){
                        echo nl2br("Sobrenome da conta alterado\n");
                    }else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                }
                if(isset ($_POST['newEmail'])){
                    $newEmail = $_POST['newEmail'];
                    $sql = "UPDATE Registro SET email ='$newEmail' WHERE email = '$email'";
                    if ($conn->query($sql) === TRUE){
                        echo nl2br("Email da conta alterado\n");
                        $email = $newEmail;
                        $_SESSION['email'] = $email;
                    }else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                if(isset ($_POST['newSenha'])){
                    $newSenha = $_POST['newSenha'];
                    $sql = "UPDATE Registro SET senha ='$newSenha' WHERE email = '$email'";
                    if ($conn->query($sql) === TRUE){
                        echo nl2br("Senha da conta alterada\n");
                        $senha = $newSenha;
                        $_SESSION['senha'] = $senha;
                    }else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                break;

            case 'Deletar conta':

                $sql = "delete from Registro where email = '$email' and senha = '$senha'";
                if ($conn->query($sql) === TRUE){
                    echo "Conta de email: ". $email. " deletada!";
                }else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                break;
        }
    }
}

?>