<?php

namespace App\View;

use App\Interfaces\ViewInterface;

/**
 * BrowserView class
 */
class BrowserView implements ViewInterface
{
    /**
     * Set headers for JSON response
     */
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
        header('Content-Type: application/json; charset=utf-8');
    }

    /**
     * Dispaly tools data
     *
     * @param array $data
     * @return void
     */
    public function display(array $data)
    {
        echo json_encode($data);
    }
}
