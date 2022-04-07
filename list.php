<?php

require_once 'config.php';

// Consultar tabela de interessados
$tabela = array();

$consulta = (' SELECT id, nome, telefone, nascimento FROM login ORDER BY id desc');

foreach ( $db->query( $consulta ) as $reg ) {
    $tabela[ $reg['id'] ] = [ 'nome' => $reg['nome'], 'telefone' => $reg['telefone'], 'nascimento' => $reg['nascimento'] ];
}