<?php
// Conexão com o banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "seu_usuario"; // Nome de usuário do MySQL
$password = "sua_senha"; // Senha do MySQL
$dbname = "sua_base_de_dados"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificando se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtendo os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar se o usuário e senha existem no banco de dados
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Verificando se encontrou algum registro
    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso
        echo "Login bem-sucedido!";
    } else {
        // Falha na autenticação
        echo "Nome de usuário ou senha incorretos.";
    }
}

// Fechando a conexão
$conn->close();

// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$destino = $_POST['destino'];
$data_partida = $_POST['data_partida'];
$mensagem = $_POST['mensagem'];

// E-mail do responsável pelo processo de visto
$email_destinatario = "responsavel@exemplo.com";

// Assunto do e-mail
$assunto = "Marcação de Viagem para $destino";

// Corpo do e-mail
$corpo_email = "Nome: $nome\n";
$corpo_email .= "Email: $email\n";
$corpo_email .= "Destino da Viagem: $destino\n";
$corpo_email .= "Data de Partida: $data_partida\n";
$corpo_email .= "Mensagem:\n$mensagem";

// Enviando o e-mail
if (mail($email_destinatario, $assunto, $corpo_email)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Erro ao enviar o e-mail.";
}
?>
