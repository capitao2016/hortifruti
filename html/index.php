<?php
    session_start();

    include ('../config/conexao.php');

    $sql = "SELECT * FROM cd_produtos WHERE categoria='frutas'";
    $query = mysqli_query($con, $sql);

        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array( );
         }
        // print_r($_SESSION['carrinho']);
        if(isset($_GET['add'])){
            $id = $_GET['id'];
            $qnt = $_GET['qnt'];

            if(!isset($_SESSION['carriinho'] [ '$id'])){
                $_SESSION['carriinho']  [$id] = $qnt ;
            }
        }
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
                            <input type="search" maxlength="20" class="search">
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
                                <p class="titulo nome"><?php echo $dados['item'];?></p>
                            </div>
                            <div class="img">
                                <img src="<?php echo $dados['nomeImagem'];?>">
                            </div>
                        </button>
                    </form>
                    <?php };?>
                </div>
            </div>
        <!-- CONTAINER RESUMO -->
            <div class="container_resumo">
                <div class="cart_item">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="cod">Cod</th>
                                        <th>Descrição</th>
                                        <th>Qnt</th>
                                        <th>Unit.</th>
                                        <th>Total</th>
                                        <th>~</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        // session_destroy();

                                        //  if(!isset($_SESSION['carrinho'])){
                                        //     $_SESSION['carrinho'] = array( );
                                        // }
                                        // // print_r($_SESSION['carrinho']);
                                        // if(isset($_GET['add'])){
                                        //     $id = $_GET['id'];
                                        //     $qnt = $_GET['qnt'];

                                        //     if(!isset($_SESSION['carriinho'] [ '$id'])){
                                        //         $_SESSION['carriinho']  [$id] = $qnt ;
                                        //     }
                                        // }
                                            
                                         if(count($_SESSION['carriinho']) == 0){
                                                    echo "<tr><td colspan='6'>Não há itens no carrinho!</td></tr>";
                                         }else {
                                                    foreach($_SESSION['carriinho'] as $id => $qnt){
                                                        $sql = mysqli_query($con, "SELECT * FROM cd_produtos WHERE id = $id");
                                                        $bd = mysqli_fetch_array($sql);
                                                        $item = $bd['item'];
                                                        $qnt = $qnt;
                                                        $preco = $bd['preco'];
                                                        $total = $qnt * $preco;
                                                        echo "
                                                            <tr>
                                                                    <td>$id</td>
                                                                    <td>$item</td>
                                                                    <td>$qnt</td>
                                                                    <td>$preco</td>
                                                                    <td>$total</td>
                                                                    <td><a href=''><span class='material-icons'>delete</span></a></td>
                                                            </tr>
                                                        ";
                                                    }
                                                }  
                                    ?>
                                    <!-- <tr>
                                        <td rowspan="2">?php echo $id;?></td>
                                        <td colspan="4" class="desc">?php echo $bd['item'];?></td>
                                        <td rowspan="2"><span class="material-icons">delete</span></td>
                                    </tr>
                                    <tr class="linha">
                                        <td></td>
                                        <td class="qnt_cart">
                                            <button class="menos_cart"><span class="material-icons">remove</span></button>
                                            <input type="number" class="qnt_cart" value="?php echo $qnt;?>">
                                            <button class="mais_cart"><span class="material-icons">add</span></button>
                                        </td>
                                        <td>?php echo $bd['preco'];?></td>
                                        <td>total</td>
                                        <td></td>
                                    </tr> -->
                                    <!-- ?php }?> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="footer">
                            <table>
                                <!-- <thead>
                                    <tr>
                                        <th>qnt item</th>
                                        <th>espaço vazio</th>
                                        <th>qnt</th>
                                    </tr>
                                </thead> -->
                                <tbody>
                                    <?php
                                            foreach($_SESSION['carriinho'] as $id => $qnt){
                                                                $sql = mysqli_query($con, "SELECT * FROM cd_produtos WHERE id = $id");
                                                                $bd = mysqli_fetch_array($sql);
                                                                $item = $bd['item'];
                                                                $qnt = $qnt;
                                                                $preco = $bd['preco'];
                                                                $total = $qnt * $preco;

                                                                echo "
                                                                    <tr>
                                                                        <td class='col-1'>Quantidade de Itens</td>
                                                                        <td class='col-2'></td>
                                                                        <td class='col-3'>5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='col-1'>Sub-Total</td>
                                                                        <td class='col-2'></td>
                                                                        <td class='col-3'>50,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='col-1'>Cupom de desconto</td>
                                                                        <td class='col-2'><input type='text' value='JGL2025'></td>
                                                                        <td class='col-3'><span>-</span>10,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='col-1'>Total</td>
                                                                        <td class='col-2'></td>
                                                                        <td class='col-3'><span>=</span>40,00</td>
                                                                    </tr>
                                                                ";

                                            }
                                    ?>
                                </tbody>
                            </table>           
                        </div>
                </div>
                <div class="btn_buy">
                         <button><p>Pagamento</p></button>
                </div>
            </div>
        </div>    
    </main>
   <!-- MENU LATERAL -->
    <div class="menu_modal">
        <div class="btn_fechar">
            <h1>X</h1>
        </div>
        <div class="menu_lista">
            <a href="../html/cd_produtos.php">Cadastrar Produtos</a>
            <a href="../html/comprar.php">comprar</a>
        </div>                                 
    </div>
</body>
</html>
<!-- <div class="qnt_itens">
                                <h2>?php echo $item;?></h2>
                                <h2>5</h2>
                            </div>
                            <div class="subtotal">
                                <h2>SubTotal</h2>
                                <h2>?php echo $preco;?></h2>
                            </div>
                            <div class="cupom">
                                <h2>Cupom Desconto</h2>
                                <input type="text" value="jgl2025">
                                <h2><span>-</span>5,00</h2>
                            </div>
                            <div class="taxa">
                                <h2>Taxa</h2>
                                <h2><span>+</span>3,00</h2>
                            </div>
                            <div class="total">
                                <h2>Total</h2>
                                <h2>53,00</h2>
                            </div> -->