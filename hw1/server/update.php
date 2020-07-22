<?php

$id = $_GET['id'];

$stmt = Database :: prepare("SELECT * from books WHERE id=$id;");
$stmt -> execute();
$arr = $stmt -> fetchAll();

foreach ($arr as $value) {
  $oldtitle = $value['title'];
  $oldauthor = $value['author_name'];
  $oldpuplisher = $value['publisher_name'];
  $oldyear = $value['publish_year'];
}

if(isset($_POST['book-title-edit']))
{
  $newtitle = $_POST['book-title'];
  $sql = "UPDATE books SET title=:newtitle WHERE id=:id";
  $stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt -> execute(array(':newtitle' => $newtitle, ':id' => $id));
  header("Refresh:0");
}

if(isset($_POST['book-author-edit']))
{
  $newauthor = $_POST['book-author'];
  $sql = "UPDATE books SET author_name=:newauthor WHERE id=:id";
  $stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt -> execute(array(':newauthor' => $newauthor, ':id' => $id));
  header("Refresh:0");
}

if(isset($_POST['book-publisher-edit']))
{
  $newpublisher = $_POST['book-publisher'];
  $sql = "UPDATE books SET publisher_name=:newpublisher WHERE id=:id";
  $stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt -> execute(array(':newpublisher' => $newpublisher, ':id' => $id));
  header("Refresh:0");
}

if(isset($_POST['book-year-edit']))
{
  $newyear = $_POST['book-year'];
  $sql = "UPDATE books SET publish_year=:newyear WHERE id=:id";
  $stmt = Database :: prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt -> execute(array(':newyear' => $newyear, ':id' => $id));
  header("Refresh:0");
}

?>
