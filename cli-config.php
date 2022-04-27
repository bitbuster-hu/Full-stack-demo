<?php

require_once "vendor/autoload.php";

$entityManager = App\Bootstrap::init();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
