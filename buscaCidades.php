<?php

$conexao = new PDO("mysql:host=localhost;dbname=ualmart","root","");
$conexao->exec('SET CHARACTER SET utf8');

$buscaCidades = $conexao->prepare("SELECT * FROM cidades WHERE id_estado='".$_POST['id']."'");
$buscaCidades->execute();

        $fetchAll = $buscaCidades->fetchAll();
        
        foreach($fetchAll as $cidades)
        {
            echo '<option value="'.$cidades['idcidade'].'">'.$cidades['nome'].'</option>';
        }
