<?php

require('db.php');

$id = $_GET['id'];
$stmt = Database :: prepare("DELETE FROM books WHERE id=$id");
$stmt -> execute();
header("Location: ../");

?>
