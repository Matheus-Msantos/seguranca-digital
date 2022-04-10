<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );
header( 'Access-Control-Allow-Methods: PUT' );
header( 'Access-Control-Max-Age: 3600' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

include_once '../config/database.php';
include_once '../class/users.php';

$database = new Database();
$db = $database->getConnection();
$item = new User( $db );
$data = json_decode( file_get_contents( 'php://input' ) );
$item->id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] ?? $_PUT[ 'id' ] : die();

$item->nome = $data->nome;
$item->nascimento = $data->nascimento;
$item->telefone = $data->telefone;

if ( $item->updateUser() ) {
    echo json_encode( 'Dados do usuário atualizado!' );
} else {
    echo json_encode( 'Erro ao atualizar dados do usuário!' );
}
