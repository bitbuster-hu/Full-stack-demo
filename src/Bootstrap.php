<?php

namespace App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap
{

    /**
     * Create entity manager
     */
    public static function init()
    {

        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $connectionParams = [
            'url' => 'pdo-mysql://root:default@db/test'
        ];

        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        // obtaining the entity manager
        $entityManager = EntityManager::create($conn, $config);

        return $entityManager;
    }
}
