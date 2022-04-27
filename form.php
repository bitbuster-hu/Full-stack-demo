<?php

use App\Controller;

require_once "vendor/autoload.php";

$_POST = [
    'worker_name' => 'Worker',
    'tool_name' => 'Worker tool',
    'date_of_purchase' => '2022-01-01',
    'tool_status' => 'active'
];

$controler = new Controller();

$worker = $controler->createWorker($_POST['worker_name']);

$tool = $controler->createTool($_POST['tool_name'],new \DateTime($_POST['date_of_purchase']), $_POST['tool_status']);

$controler->setToolWorker($worker->getId(), $tool->getId());

$result = $controler->getToolById($tool->getId());

echo "Tool: '" . $result->getName() . "' created for worker: '" . $worker->getName() .  "'\n";

