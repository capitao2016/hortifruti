<?php
    include_once('../config/conexao.php');

    $id = $_GET['id'];
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
   
</body>
</html>