<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    // Verifica se o método de requisição é POST e se o arquivo foi enviado

    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Verifica se não houve erro durante o upload do arquivo

        $target_dir = "uploads/";
        // Define o diretório onde o arquivo será armazenado

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Cria o caminho completo para o arquivo destino concatenando o diretório e o nome do arquivo

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Obtém a extensão do arquivo e a converte para minúsculas

        // Verifica se o arquivo é realmente uma imagem
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Se getimagesize retornar um valor diferente de false, o arquivo é uma imagem

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Move o arquivo enviado para o diretório de destino especificado

                echo "<span>O arquivo". basename($_FILES["image"]["name"]).
                "foi enviado com sucesso.</span>";
                // Mensagem de sucesso após o upload ser realizado com sucesso
            } else {
                echo "<p>Desculpe, houve um erro ao enviar o seu arquivo.</p>";
                // Mensagem de erro caso haja um problema ao mover o arquivo para o diretório de destino
            }
        } else {
            echo "<p>O arquivo não é uma imagem.</p>";
            // Mensagem de erro se o arquivo não for uma imagem
        }
    } else {
        // Mostra mensagem de erro específica caso o upload do arquivo tenha falhado
        echo "<p>Erro no upload: </p>" . $_FILES['image']['error'];
    }
} else {
    echo "<p>Nenhum arquivo enviado.</p>";
    // Mensagem de erro se o método de requisição não for POST ou se nenhum arquivo for enviado
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <link rel="stylesheet" href="./assets./css./style.css">
</head>
<body>
    <a href="index.php">Clique aqui para voltar ao menú</a>
    
</body>
</html>