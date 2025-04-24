<?php
    include ('../config/conexao.php');

    $sql = "SELECT * FROM produtos WHERE categoria='frutas'";
    $query = mysqli_query($con, $sql);

    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/index.js" defer></script>
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
    <nav>
        <div class="label" id="label_produtos">
            <label for="input_produtos">Produtos</label>
        </div>
        <div class="label" id="label_resumo">
            <label for="input_resumo">Resumo</label>
        </div>
    </nav>
    <main>
        <div class="global">
            <input type="radio" name="radios" id="input_produtos" class="input_produtos" checked>
            <input type="radio" name="radios" id="input_resumo" class="input_resumo">
        <!-- CONTAINER PRODUTOS -->
            <div class="container_produtos first">
                <div class="barra_info">
                    <div class="container_search">
                        <div class="box_search">
                            <input type="text" maxlength="20" class="search">
                            <button>
                                <span class="material-icons">search</span>
                            </button>
                        </div>
                    </div>
                    <div class="container_cart">
                        <div class="icon_cart">
                            <span class="material-icons">shopping_cart</span>
                            <p>9</p>
                        </div>
                        <div class="valor_icon">
                            <span class="cifrao">R$</span>
                            <span class="valor">120,50</span>
                        </div>
                    </div>
                </div>
                <div class="categorias">
                    <a href="" target="" class="frutas cat">Frutas</a>
                    <a href="" class="verdeuras cat">Verduras</a>
                    <a href="" class="raizes cat">Raizes</a>
                    <a href="" class="temperos cat">Temperos</a>
                </div>
                <div class="container_iframe" id="iframe">
                    <?php
                        while($dados = mysqli_fetch_array($query)){
                    ?>
                    <form action="../html/comprar.php" method="POST">
                        <button type="submit" class="container_item" id="container_item">
                            <input type="hidden" value="<?php echo $dados['id'];?>" name="id" id="id">
                            <div class="box_titulo">
                                <p class="titulo nome"><?php echo $dados['nome'];?></p>
                            </div>
                            <div class="img">
                                <img src="<?php echo $dados['nomeImagem'];?>" alt="abacate">
                            </div>
                        </button>
                    </form>
                    <?php };?>
                </div>
            </div>
        <!-- CONTAINER RESUMO -->
            <div class="container_resumo">
               <div class="cart_item">
                    <table>
                        <tr class="linha">
                            <td>
                                <div class="table_item">
                                    <div class="linha1">
                                        <p class="titulo_item">Goiaba Vermelha</p>
                                        <p class="valor_item">R$ <span>10,00</span></p>
                                    </div>
                                    <div class="linha2">
                                        <p class="qnt">1.5 <span>Kg</span></p>
                                        <p class="media">Media <span>4 a 6 Und.</span></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
               </div>
               <div class="btn_buy">
                    <button><p>Pagamento</p></button>
               </div>
            </div>
        </div>    
    </main>
    <!-- <div class="modal_produtos" id="modal_produtos">
            <div class="fechar" id="fechar">
                <button>FECHAR</button>
            </div>
            <div class="modal">
                <form action="" id="form_qnt">
                <div class="box_titulo">
                    <p class="titulo">Pêra</p>
                </div>
                <div class="box_infor">
                    <div class="preco">
                        <div class="cifrao">R$</div>
                        <div class="price">2,50</div>
                    </div>
                    <div class="desc">
                        <p class="und">und.</p>
                        <p class="peso">100g <span>Média</span></p>
                    </div>
                </div>
                <div class="box_qnt">
                    <input type="text" class="input_qnt" value="1">
                </div>
                <button class="add" id="submit">
                    <span class="material-icons">shopping_cart</span>
                    Adicionar
                </button>
                </form>
                <div class="btn">
                    <button class="menos btn_qnt"><span class="material-icons">remove</span></button>
                    <button class="mais btn_qnt"><span class="material-icons">add</span></button>
                </div>
            </div>
    </div> -->
    <div class="modal_menu">
        <div class="fechar_menu">X</div>
        <div class="menu">
            <a href=""><h2>Admin</h2></a>
            <a href=""><h2>Clientes</h2></a>
            <a href="cd_produtos.php"><h2>cd_produtos</h2></a>
        </div>
    </div>
</body>
</html>