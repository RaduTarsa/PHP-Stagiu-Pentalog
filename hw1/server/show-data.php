<?php

$ini = "server/config.ini";

$stmt = Database :: prepare("SELECT * from books;");
$stmt -> execute();
$arr = $stmt -> fetchAll();

foreach ($arr as $value) {
  echo "<tr>";
  echo "<td>";
  print($value['id']);
  echo "</td>";
  echo "<td>";
  print($value['title']);
  echo "</td>";
  echo "<td>";
  print($value['author_name']);
  echo "</td>";
  echo "<td>";
  print($value['publisher_name']);
  echo "</td>";
  echo "<td>";
  print($value['publish_year']);
  echo "</td>";
  echo "<td>";
  print($value['created_at']);
  echo "</td>";
  echo "<td>";
  print($value['updated_at']);
  echo "</td>";
  echo "<td><a href=\"edit.php?id=".$value['id']."\">Edit</a></td>";
  echo "<td><a href=\"server/delete.php?id=".$value['id']."\">Delete</a></td>";

  echo "</tr>";
}
$stmt -> closeCursor();

?>
