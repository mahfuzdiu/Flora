<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public $twig;

    public function __construct()
    {
        $loader = new ArrayLoader();
        $this->twig = new Environment($loader);
        $loader = new FilesystemLoader(__DIR__ . './../views');
        $this->twig = new Environment($loader);
    }

    public function view($fileName, array $params = [])
    {
        echo $this->twig->render($fileName . '.html', $params);
    }
}