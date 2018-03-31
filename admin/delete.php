<?php
require '../include/db.php';
$id = $_GET['id'];

$sql = $db->prepare("DELETE FROM `articles` WHERE `id` = :ider");
$sql->bindParam(':ider', $id, PDO::PARAM_INT);
$sql->execute();
header('Location: /');
 ?>
