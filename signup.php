<?php
if(isset ($_POST['nome']) and isset ($_POST['sobrenome']) and isset ($_POST['email']) and isset ($_POST['password']) and isset ($_POST['passconf'])){
    $senha = $_POST['password'];
    $email= $_POST['email'];
    $senhaconf = $_POST['passconf'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    if(strcmp($senha, $senhaconf) == 0){
        echo nl2br("Cadastro realizado!");
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo nl2br("Connected successfully\n");
        $sql = "USE Usuario";

        if ($conn->query($sql) === TRUE) {
            echo nl2br("Used db usuario successfully\n");
            $sql = "select * from Registro where email  = '$email'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows === 0) { //conta com esse email não existe, nova conta
                $sql = "INSERT INTO Registro (nome, sobrenome, email, senha)
                VALUES ('". $nome . "', '". $sobrenome . "', '" . $email . "', '" . $senha . "')";

                if ($conn->query($sql) === TRUE) {
                    echo nl2br("New record created successfully");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            }else{ //conta com esse email já existe
                echo nl2br("Uma conta com esse email já está cadastrada!\n");
            }

        } else {
            echo nl2br("Error using db usuario" . $conn->error . "\n");
        }
        $conn->close();

    }else{
        echo "Erro, senhas diferentes!";
    }
}



// if(isset ($_POST['nome']) and isset ($_POST['sobrenome']) and isset ($_POST['email']) and isset ($_POST['password']) and isset ($_POST['passconf'])){
//     $password = $_POST['password'];
//     $email= $_POST['email'];
//     $passconf = $_POST['passconf'];
//     if(strcmp($password, $passconf) == 0){
//         echo "Cadastro realizado!";
//         $output = array($email, $password);
//         file_put_contents('data.txt', implode(",", $output));
//     }else{
//         echo "Erro, senhas diferentes!";
//     }
// }else{
//     echo "Campos vazios!";
//}
?>