<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pentalog | Homework 2</title>
  <link rel="stylesheet" href="stylesheets/edit.css">
</head>
<body>

<form action="/update" method="POST" >
    <input type="hidden" name="id" value="<?=$book[0]->id;?>"/>
    <label for="title">Title</label><br>
    <input type="text" id="titlu" name="book-title" value="<?=$book[0]->title;?>"/><br>
    <label for="author">Author</label><br>
    <input type="text" id="author" name="book-author" value="<?=$book[1]['author_name'];?>"/><br>
    <label for="publisher">Publisher</label><br>
    <input type="text" id="publisher" name="book-publisher" value="<?=$book[2]['publisher_name'];?>"/><br>
    <label for="year">Publish year</label><br>
    <input type="text" id="year" name="book-year" value="<?=$book[0]->publish_year;?>"/><br>
    <input type="submit" value="Edit"/>
</form>

<br><hr><br>

<a href="/">Go Back</a>

</body>
</html>
