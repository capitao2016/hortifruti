<?php
    include ('../config/conexao.php');

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $tipo = $_POST['tipo'];
        $peso = $_POST['peso'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['img'];
    ////// TRATAMENTO DA IMAGEM////////////
        $pasta = "../Imagens/img_produtos/";
        $nomeImagem = $img['name'];
        $novoNome = uniqid();
        $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
        $path = $pasta . $novoNome . '.' . $extensao;
        $resul = move_uploaded_file($img['tmp_name'], $path);

        MYSQLI_QUERY($con, "INSERT INTO produtos(nome, preco, tipo, peso, categoria, img, nomeImagem) VALUES('$nome', '$preco', '$tipo', '$peso', '$categoria', '$nomeImagem', '$path')");
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../css/cd_produtos.css">
    <script src="../js/cd_produtos.js" defer></script>
    <title>JGL</title>
</head>
<body>
    <header>
        <div class="menu">
            <span class="material-icons menu">list</span>
        </div>
        <div class="logotipo">
            <div class="logo">
                <a href="index.php">
                    <img src="../Imagens/Icones/arte.png" alt="logotipo">
                </a>
            </div>
        </div>
        <div class="redes_sociais">
            <a href="">
                <span class="material-icons menu">call</span>
            </a>
        </div>
    </header>
    <div class="cd_produtos">
        <h1>CADASTRO DE PRODUTOS</h1>
        <div class="cadastro">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="box">
                    <div class="label">
                        <label for="preco">Nome</label>
                    </div>
                    <div class="input">
                        <input type="text" name="nome" class="nome" id="nome" autofocus>
                    </div>
                </div><br>
                <div class="box">
                    <div class="label">
                        <label for="preco">Preço</label>
                    </div>
                    <div class="input">
                        <input type="text" name="preco" class="preco" id="preco">
                    </div>
                </div><br>
                <div class="box">
                    <div class="label">
                        <label for="preco">Tipo</label>
                    </div>
                    <div class="input">
                        <input type="text" name="tipo" class="tipo" id="tipo">
                    </div>
                </div><br>
                <div class="box">
                    <div class="label">
                        <label for="preco">Pêso</label>
                    </div>
                    <div class="input">
                        <input type="text" name="peso" class="peso" id="peso">
                    </div>
                </div><br>
                <div class="box">
                    <div class="label">
                        <label for="preco">Categoria.</label>
                    </div>
                    <div class="input">
                        <input type="text" name="categoria" class="categoria" id="categoria">
                    </div>
                </div><br>
                <div class="box">
                    <div class="label label_img">
                        <label for="img">Imagem</label>
                    </div>
                    <div class="input">
                        <input type="file" name="img" class="img" id="img">
                    </div>
                </div>
                <div class="btn">
                    <button type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>