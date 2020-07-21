<?php
require('server/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pentalog | Homework 1</title>
  <link rel="stylesheet" href="stylesheets/index.css">
</head>
<body>

<a href="create.php">Add Book</a>

<br><hr><br>

  <table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Author Name</th>
    <th>Publisher Name</th>
    <th>Publish Year</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
    <?php
    require('server/show-data.php')
    ?>
</table>

</body>
</html>
