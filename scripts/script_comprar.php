<?php
    session_start();
    include ('../config/conexao.php');

        if(!isset($_SESSION['itens'])){
            $_SESSION['itens'] = array();
        }
        if(isset($_GET['add'])){
            $id = $_GET['id'];
            
           if(!isset($_SESSION['itens']  [$id])){
                $_SESSION['itens']  [$id] = 1;
           } else {
                $_SESSION['itens']  [$id] += 1;
           }
        }


// if(isset($_POST['add'])){
//     // $id = $_POST['id'];
//     $item = $_POST['item'];
//     $qnt = $_POST['qnt'];
//     $preco = $_POST['preco'];
//     $soma = $qnt * $preco;
//     $total = number_format(($soma),2,',','.');

//     var_dump($total);

//     $sql = MYSQLI_QUERY($con,  "INSERT INTO pedidos (item, qnt, preco, total) VALUES ('$item', '$qnt', '$preco', '$total')");
// }

// header('location: ../html/index.php');