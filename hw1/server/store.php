<?php

if(isset($_POST['book-add']))
{
  $title = $_POST['book-title'];
  $author = $_POST['book-author'];
  $publisher = $_POST['book-publisher'];
  $year = $_POST['book-year'];
  $stmt = Database :: prepare("INSERT INTO books (title, author_name, publisher_name, publish_year)
  VALUES ('$title', '$author', '$publisher', '$year')");
  $stmt -> execute();
}

?>
