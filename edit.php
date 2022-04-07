<?php

require_once 'config.php';

if ( isset($_POST['id']) ) {
    $id = preg_replace('/\D/', '', $_POST['id']);

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
   
    $objStmt = $db->prepare(" UPDATE login SET nome = :nome, telefone = :telefone, nascimento = :nascimento WHERE id = :id ");

    $objStmt->bindParam(':id', $id);
    $objStmt->bindParam(':nome', $nome);
    $objStmt->bindParam(':telefone', $telefone);
    $objStmt->bindParam(':nascimento', $nascimento);

    if ( $objStmt->execute() ) {
        $msg = 'Dados Atualizados!';  
    }else {
        $msg = 'ERRO ao atualizar os dados!';  
    }
}

$_GET['id'] = $_GET['id'] ?? $_POST['id'] ?? null;

//Evita SQL injection
$id = preg_replace('/\D/', '', $_GET['id']);

$user = array();

$consulta = (" SELECT id, nome, telefone, nascimento FROM login WHERE id = $id");

foreach ( $db->query( $consulta ) as $registro ) {
    $user = $registro;
}

include 'editar_tpl.php';