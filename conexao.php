<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "ualmart";

$conexao = @mysqli_connect($host, $user, $pass, $banco )
or die ("Problemas com a conexão do Banco de Dados");
