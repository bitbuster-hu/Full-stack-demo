<?php

declare(strict_types=1);

use App\View\ViewFactory;
use PHPUnit\Framework\TestCase;
use App\Interfaces\ViewInterface;

class ViewFactoryTest extends TestCase
{
    public function testCanCreateView()
    {
        $viewFactory = new ViewFactory;
        $view = $viewFactory->createView();

        $this->assertInstanceOf(ViewInterface::class, $view);
    }
}
