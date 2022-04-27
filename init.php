<?php

require_once "vendor/autoload.php";

use App\Controller;

$controller = new Controller();

$controller->updateSchema();

$controller->createInitialDataset();

