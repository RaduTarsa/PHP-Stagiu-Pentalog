<?php

require('db.php');

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=:id";
$stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$stmt -> execute(array(':id' => $id));
header("Location: ../");

?>
