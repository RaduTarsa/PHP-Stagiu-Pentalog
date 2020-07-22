<?php
require('server/db.php');
require('server/store.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pentalog | Homework 1</title>
  <link rel="stylesheet" href="stylesheets/create.css">
</head>
<body>

<form method="post">
  <h3>Book Title:</h3>
  <input type="text" name="book-title">
  <h3>Book Author:</h3>
  <input type="text" name="book-author">
  <h3>Book Publisher:</h3>
  <input type="text" name="book-publisher">
  <h3>Book Publish Year:</h3>
  <input type="number" name="book-year">
  <br>
  <input type="submit" name="book-add" value="Add Book">
</form>

<br><hr><br>

<a href="index.php">Go Back</a>

</body>
</html>
