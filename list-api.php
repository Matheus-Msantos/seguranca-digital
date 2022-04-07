<?php
 
header("Content-Type:application/json");
include('config.php');
 
if (isset($_GET['user_id']) && $_GET['user_id']!="") {
 
 $user_id = $_GET['user_id'];
 $query = "SELECT * FROM login WHERE id=$user_id";
 $result = mysql_query($query, $db);
 $row = mysql_fetch_array($result,MYSQLI_ASSOC) ;
 
 $userData['id'] = $row['id'];
 $userData['nome'] = $row['nome'];
 $userData['telefone'] = $row['telefone'];
 $userData['nascimento'] = $row['nascimento'];
 
 $response["status"] = "true";
 $response["message"] = "Customer Details";
 $response["customers"] = $userData;
 
} else {
 $response["status"] = "false";
 $response["message"] = "No customer(s) found!";
}
echo json_encode($response); exit;
 
?>