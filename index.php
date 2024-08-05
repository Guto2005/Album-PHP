<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <link rel="stylesheet" href="./assets./css./style.css">
    <style>

        .gallery {
            display:flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-left: 20px;
            background-color: rgba(255, 255, 255, 0.507);
            gap:32px;
            padding-bottom: 40px;
        }
        .gallery img {
            width: 29%;
            margin: 0.5%;
            transition: transform 0.2s;
            background-color: white;
            padding: 8px;
        }
        .gallery img:hover {
            transform: scale(1.5);
        }
    </style>
</head>
<body>
    <h1>Galeria de Imagens</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <button type="submit">Enviar Imagem</button>
    </form>
    <div class="gallery">
    <?php 
        
        $files = glob("uploads/*.*");
        // Utiliza a função glob para obter uma lista de todos os arquivos na pasta "uploads" com qualquer extensão
        
        foreach($files as $file) {
            // Itera sobre cada arquivo na lista de arquivos obtida
        
            echo '<img src="' . $file . '" alt="Imagem">';
            // Exibe cada arquivo como uma imagem HTML, com o atributo "src" apontando para o caminho do arquivo
            // O atributo "alt" fornece um texto alternativo "Imagem" caso a imagem não possa ser carregada
        }
        
        ?>
        
    </div>
</body>
</html>