<?php
header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );

include_once '../config/database.php';
include_once '../class/users.php';

$database = new Database();
$db = $database->getConnection();
$items = new User( $db );
$stmt = $items->getUsers();

$userArr = array();
$userArr[ 'body' ] = array();

while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    extract( $row );
    $e = array(
        'id' => $id,
        'nome' => $nome,
        'nascimento' => $nascimento,
        'telefone' => $telefone
    );

    array_push( $userArr[ 'body' ], $e );
}
echo json_encode( $userArr );
