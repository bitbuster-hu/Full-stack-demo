<?php

namespace App;

/**
 * Abstract class to handle DB connection
 */
abstract class Base
{
    protected $entityManager;

    /**
     * Create entity manager
     */
    public function __construct()
    {
        $this->entityManager = Bootstrap::init();

    }

}
