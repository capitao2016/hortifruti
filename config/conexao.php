<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$bd = 'hortifruti';

$con = new mysqli($hostname, $username, $password, $bd);

// if($con->connect_error){
//     echo("Conexão Falhou:" . $con->connect_error);
// } else{
//     echo("Conexão com Sucesso!");
// }