<?php
require('server/db.php');
require('server/update.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pentalog | Homework 1</title>
  <link rel="stylesheet" href="stylesheets/edit.css">
</head>
<body>

<form method="post">
  <h3>Old Title:</h3>
  <p><?=$oldtitle?></p>
  <h3>New Title:</h3>
  <input type="text" name="book-title">
  <input type="submit" name="book-title-edit" value="Edit Title">
</form><hr>
<form method="post">
  <h3>Old Author:</h3>
  <p><?=$oldauthor?></p>
  <h3>New Author:</h3>
  <input type="text" name="book-author">
  <input type="submit" name="book-author-edit" value="Edit Name">
</form><hr>
<form method="post">
  <h3>Old Publisher:</h3>
  <p><?=$oldpuplisher?></p>
  <h3>New Publisher:</h3>
  <input type="text" name="book-publisher">
  <input type="submit" name="book-publisher-edit" value="Edit Name">
</form><hr>
<form method="post">
  <h3>Old Publish Year:</h3>
  <p><?=$oldyear?></p>
  <h3>New Publish Year:</h3>
  <input type="number" name="book-year">
  <input type="submit" name="book-year-edit" value="Edit Year">
</form>

<br><hr><br>

<form method="post">
  <input type="submit" name="go-back" value="Go Back">
</form>

</body>
</html>
