<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pentalog | Homework 2</title>
  <link rel="stylesheet" href="stylesheets/index.css">
</head>
<body>

<a href="create">Add Book</a>

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
    <?php foreach($books as $book):?>
        <tr>
            <td><?php echo $book->id;?></td>
            <td><?php echo $book->title;?></td>
            <td><?php echo $book->author_name;?></td>
            <td><?php echo $book->publisher_name;?></td>
            <td><?php echo $book->publish_year;?></td>
            <td><?php echo $book->created_at;?></td>
            <td><?php echo $book->updated_at;?></td>
            <td><a href="edit?id=<?php echo $book->id;?>">Editeaza</a></td>
            <td><a href="delete?id=<?php echo $book->id;?>">Sterge</a></td>
        </tr>
    <?php endforeach;?>
</table>

</body>
</html>
