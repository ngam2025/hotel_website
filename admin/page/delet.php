<?php   
require_once '../../config.php';

$id = $_REQUEST['id']; 

$stmt = $conn->prepare("UPDATE rooms SET r_removed=1 WHERE r_id = :id"); 

$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: rooms.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>