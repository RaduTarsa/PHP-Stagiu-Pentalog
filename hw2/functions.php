<?php

function loadView(string $viewName, array $parameters = [])
{
    if (!empty($parameters)) {
        extract($parameters);
    }
    require "views".DIRECTORY_SEPARATOR.$viewName;
}

function dd($parameter)
{
    echo "<pre>";
    var_dump($parameter);
    echo "</pre>";
    die;
}

?>
