<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );
header( 'Access-Control-Allow-Methods: DELETE' );
header( 'Access-Control-Max-Age: 3600' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

include_once '../config/database.php';
include_once '../class/users.php';

$database = new Database();
$db = $database->getConnection();

$item = new User( $db );

$data = json_decode( file_get_contents( 'php://input' ) );

$item->id = $item->id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] ?? $_PUT[ 'id' ] : die();

if ( $item->deleteUser() ) {
    echo json_encode( 'Usuário excluido.' );
} else {
    echo json_encode( 'Erro ao excluir usuário' );
}