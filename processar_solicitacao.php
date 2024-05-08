<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Solicitação de Viagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 15px;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado da Solicitação de Viagem</h1>
        <?php
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os dados do formulário
            $destino = $_POST['destino'];
            $data_ida = $_POST['data_ida'];
            $data_volta = $_POST['data_volta'];
            $quantidade_pessoas = $_POST['quantidade_pessoas'];
            $precisa_transporte = $_POST['precisa_transporte'];

            // Exibe os dados da solicitação
            echo "<p><strong>Destino:</strong> $destino</p>";
            echo "<p><strong>Data de Ida:</strong> $data_ida</p>";
            echo "<p><strong>Data de Volta:</strong> $data_volta</p>";
            echo "<p><strong>Quantidade de Pessoas:</strong> $quantidade_pessoas</p>";
            echo "<p><strong>Precisa de Transporte:</strong> ";
            echo $precisa_transporte == 'sim' ? 'Sim' : 'Não';
            echo "</p>";
        } else {
            // Se o formulário não foi enviado, exibe uma mensagem de erro
            echo "<p>O formulário não foi enviado.</p>";
        }
        ?>
    </div>
</body>
</html>
