<?php

namespace App\View;

use App\Interfaces\ViewInterface;
use App\View\BrowserView;
use App\View\ConsoleView;

/**
 * ViewFactory class
 */
class ViewFactory
{
    /**
     * Create view for  curent client (browser or console)
     *
     * @return ViewInterface
     */
    public function createView(): ViewInterface
    {
        return (PHP_SAPI === 'cli') ? new ConsoleView() : new BrowserView();
    }
}