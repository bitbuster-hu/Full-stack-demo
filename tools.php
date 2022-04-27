<?php

require_once "vendor/autoload.php";


use App\Controller;
use App\View\ViewFactory;

$controller = new Controller();

$viewFactory = new ViewFactory;

$view = $viewFactory->createView();

$view->display($controller->listTools());
