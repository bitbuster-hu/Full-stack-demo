<?php

declare(strict_types=1);

use App\Controller;
use App\Entities\Tool;
use App\Entities\Worker;
use PHPUnit\Framework\TestCase;


class DataCreationTest extends TestCase
{
    public function testCanCreateWorker()
    {
        $controler = new Controller();
        $worker = $controler->createWorker('Worker Name');

        $this->assertInstanceOf(Worker::class, $worker);
    }

    public function testCanCreateTool()
    {
        $controler = new Controller();
        $tool = $controler->createTool('New tool name', new \DateTime('now'), 'active');

        $this->assertInstanceOf(Tool::class, $tool);
    }

    public function testCanCreateToolWithWorker()
    {
        $controler = new Controller();
        $worker = $controler->createWorker('Worker With Hammer');

        $tool = $controler->createTool('Hammer', new \DateTime('now'), 'active');

        $controler->setToolWorker($worker->getId(), $tool->getId());

        $result = $controler->getToolById($tool->getId());

        $this->assertEquals('Worker With Hammer', $result->getWorker()->getName());
    }
}
