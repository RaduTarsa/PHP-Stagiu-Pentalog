<?php

if(isset($_POST['book-add']))
{
  $title = $_POST['book-title'];
  $author = $_POST['book-author'];
  $publisher = $_POST['book-publisher'];
  $year = $_POST['book-year'];
  $sql = "INSERT INTO books (title, author_name, publisher_name, publish_year)
  VALUES (:title, :author, :publisher, :year)";
  $stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt -> execute(array(':title' => $title, ':author' => $author, ':publisher' => $publisher, ':year' => $year));
}

?>
