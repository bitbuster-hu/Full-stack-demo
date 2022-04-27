<?php

namespace App\View;

use App\Interfaces\ViewInterface;

/**
 * ConsoleView class
 */
class ConsoleView implements ViewInterface
{
    /**
     * Display tools data in console
     *
     * @param array $tools
     * @return void
     */
    public function display(array $tools)
    {
        foreach ($tools as $tool) {
            echo $tool['name'] . " - " . $tool['dateOfPurchase']->format('d.m.Y') . "\n";
            if ($tool['worker']) echo "    Assigned to: " . $tool['worker']['name'] . "\n";
            echo "\n";
        }
    }
}
