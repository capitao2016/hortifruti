<?php
    include_once('../config/conexao.php');

    $id = $_POST['id'];
    $sql = "SELECT * FROM produtos WHERE id=$id";
    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../css/comprar.css">
    <script src="../js/comprar.js" defer></script>
    <title>comprar</title>
</head>
<body>
    <div class="modal_produtos" id="modal_produtos">
        <div class="fechar" id="fechar">
                <a href="../html/index.php"><button>FECHAR</button></a>
        </div>
        <div class="modal">
            <?php
                 while($dados = mysqli_fetch_array($query)){
            ?>
            <form action="../html/index.php" method="POST" id="form">
                <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                <div class="box_titulo">
                    <div class="divTitulo">
                        <p class="titulo"><?php echo $dados['nome'];?></p>
                    </div>
                    <div class="descTitulo">
                        <p>--- <span>Média</span> ---</p>
                    </div>
                </div>
                <div class="box_infor">
                    <div class="preco">
                        <div class="cifrao">
                            <p class="texto_cifrao">R$</p>
                        </div>
                        <div class="price"><?php echo number_format($dados['preco'],2,',','.');?></div>
                    </div>
                    <div class="desc">
                        <div class="box_peso">
                            <p class="peso"><?php echo number_format($dados['peso'],3,',','.');?></p>
                            <p class="tipo"><?php echo $dados['tipo'];?></p>
                            <p class="media">Média</p>

                        </div>
                    </div>
                </div>
                <button type="submit" class="add" name="add">
                    <span class="material-icons">shopping_cart</span>
                    Adicionar
                </button>
            </form>
            <div class="box_qnt">
                    <button class="menos btn"><span class="material-icons">remove</span></button>
                    <input type="text" class="input_qnt" value="1" autofocus>
                    <button class="mais btn"><span class="material-icons">add</span></button>
                </div>
            <?php }?>
        </div>
    </div>
</body>
</html>