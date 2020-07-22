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
  <p><b>Old Title:</b></p>
  <p><?=$oldtitle?></p>
  <p><b>New Title:</b></p>
  <input type="text" name="book-title">
  <input type="submit" name="book-title-edit" value="Edit Title">
</form><hr>
<form method="post">
  <p><b>Old Author:</b></p>
  <p><?=$oldauthor?></p>
  <p><b>New Author:</b></p>
  <input type="text" name="book-author">
  <input type="submit" name="book-author-edit" value="Edit Name">
</form><hr>
<form method="post">
  <p><b>Old Publisher:</b></p>
  <p><?=$oldpuplisher?></p>
  <p><b>New Publisher:</b></p>
  <input type="text" name="book-publisher">
  <input type="submit" name="book-publisher-edit" value="Edit Name">
</form><hr>
<form method="post">
  <p><b>Old Publish Year:</b></p>
  <p><?=$oldyear?></p>
  <p><b>New Publish Year:</b></p>
  <input type="number" name="book-year">
  <input type="submit" name="book-year-edit" value="Edit Year">
</form>

<br><hr><br>

<a href="index.php">Go Back</a>

</body>
</html>
