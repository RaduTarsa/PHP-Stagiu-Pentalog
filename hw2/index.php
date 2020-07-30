<?php

require "Router.php";
require "db.php";
require "models" . DIRECTORY_SEPARATOR . "Book.php";
require "models" . DIRECTORY_SEPARATOR . "Author.php";
require "models" . DIRECTORY_SEPARATOR . "Publisher.php";
require "controllers" . DIRECTORY_SEPARATOR . "BookController.php";

$uri = explode('?',trim($_SERVER['REQUEST_URI'], '/'))[0];
$router = new Router();
$router->setRoutes(require 'routes.php');
try
{
  $router->direct($uri);
}
catch(Exception $e)
{
  require("404.php");
}

?>
