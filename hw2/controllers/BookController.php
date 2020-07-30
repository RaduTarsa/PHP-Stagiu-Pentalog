<?php

require "functions.php";

class BookController
{
    public function index()
    {
      $pdo = Database::getInstance();
      // $stmt = $pdo->prepare("SELECT * FROM books");
      $stmt = $pdo->prepare("SELECT b.id, b.title, a.author_name as author_name,
        p.publisher_name as publisher_name, b.publish_year, b.created_at,
        b.updated_at FROM books b join authors a on b.author_id=a.id join
        publishers p on p.id=b.publisher_id");
      $stmt -> execute();
      $books = $stmt -> fetchAll(PDO::FETCH_CLASS);

      loadView("index.view.php", ["books" => $books]);
    }

    public function create()
    {
      loadview("create.view.php");
    }

    public function store()
    {
      // $title = $_POST['book-title'];
      // $author = $_POST['book-author'];
      // $publisher = $_POST['book-publisher'];
      // $year = $_POST['book-year'];
      // $sql = "INSERT INTO books (title, author_name, publisher_name, publish_year)
      // VALUES (:title, :author, :publisher, :year)";
      // $pdo = Database::getInstance();
      // $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      // $stmt -> execute(array(':title' => $title, ':author' => $author, ':publisher' => $publisher, ':year' => $year));
      // header("Location: /");

      $pdo = Database::getInstance();
      $title = $_POST['book-title'];
      $author = $_POST['book-author'];
      $publisher = $_POST['book-publisher'];
      $year = $_POST['book-year'];
      $author_id = 0;
      $publisher_id = 0;

      //get the number of authors with this name 1/0
      $sql = "SELECT count(*) FROM authors WHERE author_name=:author";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':author' => $author));
      $no = $stmt->fetchColumn();
      if(!$no)
      {
        //insert author
        $sql = "INSERT INTO authors (author_name) VALUES (:author)";
        $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(':author' => $author));
      }
      //get author id
      $sql = "SELECT id FROM authors WHERE author_name=:author";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':author' => $author));
      $author_id = $stmt->fetchColumn();

      //get the number of publishers with this name 1/0
      $sql = "SELECT count(*) FROM publishers WHERE publisher_name=:publisher";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':publisher' => $publisher));
      $no = $stmt->fetchColumn();
      if(!$no)
      {
        //insert publisher
        $sql = "INSERT INTO publishers (publisher_name) VALUES (:publisher)";
        $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(':publisher' => $publisher));
      }
      //get publisher id
      $sql = "SELECT id FROM publishers WHERE publisher_name=:publisher";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':publisher' => $publisher));
      $publisher_id = $stmt->fetchColumn();

      //insert book
      $sql = "INSERT INTO books (title, author_id, publisher_id, publish_year)
      VALUES (:title, :author_id, :publisher_id, :year)";

      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':title' => $title, ':author_id' => $author_id,
      ':publisher_id' => $publisher_id, ':year' => $year));
      header("Location: /");
    }

    public function edit()
    {
      $pdo = Database::getInstance();
      $stmt = $pdo->prepare("SELECT * FROM `books` WHERE `id` = ?");
      $stmt->execute([$_GET['id']]);
      $book = $stmt->fetchAll(PDO::FETCH_CLASS, Book::class)[0];
      $author_id = $book->author_id;
      $publisher_id = $book->publisher_id;

      $stmt = $pdo->prepare("SELECT author_name FROM authors WHERE id=$author_id");
      $stmt->execute();
      $book_author_name = $stmt->fetch();
      $book = array_merge(array($book), array($book_author_name));

      $stmt = $pdo->prepare("SELECT publisher_name FROM publishers WHERE id=$publisher_id");
      $stmt->execute();
      $book_publisher_name = $stmt->fetch();
      $book = array_merge($book, array($book_publisher_name));

      loadView('edit.view.php', ['book' => $book]);
    }

    public function update()
    {
      $id = $_POST['id'];

      $pdo = Database::getInstance();
      $stmt = $pdo -> prepare("SELECT * from books WHERE id=$id;");
      $stmt -> execute();
      $books = $stmt -> fetchAll();

      $title = $_POST['book-title'];
      $author = $_POST['book-author'];
      $publisher = $_POST['book-publisher'];
      $year = $_POST['book-year'];

      //get the number of authors with this name 1/0
      $sql = "SELECT count(*) FROM authors WHERE author_name=:author";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':author' => $author));
      $no = $stmt->fetchColumn();
      if(!$no)
      {
        //insert author
        $sql = "INSERT INTO authors (author_name) VALUES (:author)";
        $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(':author' => $author));
      }
      //get author id
      $sql = "SELECT id FROM authors WHERE author_name=:author";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':author' => $author));
      $author_id = $stmt->fetchColumn();

      //get the number of publishers with this name 1/0
      $sql = "SELECT count(*) FROM publishers WHERE publisher_name=:publisher";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':publisher' => $publisher));
      $no = $stmt->fetchColumn();
      if(!$no)
      {
        //insert publisher
        $sql = "INSERT INTO publishers (publisher_name) VALUES (:publisher)";
        $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(':publisher' => $publisher));
      }
      //get publisher id
      $sql = "SELECT id FROM publishers WHERE publisher_name=:publisher";
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':publisher' => $publisher));
      $publisher_id = $stmt->fetchColumn();

      $sql = "UPDATE books SET title=:title, author_id=:author_id,
      publisher_id=:publisher_id, publish_year=:year, updated_at=NOW() WHERE id=:id";
      $pdo = Database::getInstance();
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':title' => $title, ':author_id' => $author_id,
      ':publisher_id' => $publisher_id, ':year' => $year, ':id' => $id));
      header("Location: /");
    }

    public function delete()
    {
      $id = $_GET['id'];
      $sql = "DELETE FROM books WHERE id=:id";
      $pdo = Database::getInstance();
      $stmt = $pdo -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt -> execute(array(':id' => $id));
      header("Location: /");
    }
}

?>
