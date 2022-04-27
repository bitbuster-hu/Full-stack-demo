<?php

namespace App;

use DateTime;
use App\Entities\Tool;
use App\Entities\Worker;

/**
 * Controller class for create Workers and Tools
 */
class Controller extends Base
{
    private $workers = [];
    private $workersData = [
        ["name" => "First worker"],
        ["name" => "Second worker"],
        ["name" => "Third worker"],
        ["name" => "Fourth worker"],
        ["name" => "Fifth worker"],
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Truncate all table by deleting and creating a schema
     *
     * @return void
     */
    public function updateSchema()
    {
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->entityManager);

        $classes = array(
            $this->entityManager->getClassMetadata('App\Entities\Tool'),
            $this->entityManager->getClassMetadata('App\Entities\Worker')
        );

        $schemaTool->dropSchema($classes);
        $schemaTool->createSchema($classes);
    }

    /**
     * List tools
     *
     * @return array
     */
    public function listTools(): array
    {
        $dql = "SELECT t, w FROM App\Entities\Tool t LEFT JOIN t.worker w";
        $query = $this->entityManager->createQuery($dql);
        $tools = $query->getArrayResult();

        return $tools;
    }

    /**
     * Create tool
     *
     * @param string $name
     * @param DateTime $date
     * @param string $state
     * @return Tool
     */
    public function createTool(string $name, DateTime $date, string $state = 'active'): Tool
    {
        $tool = new Tool();
        $tool->setName($name);
        $tool->setDateOfPurchase($date);
        $tool->setState($state);

        $this->entityManager->persist($tool);
        $this->entityManager->flush();
        return $tool;
    }

    /**
     * Set the worker id to the tool
     *
     * @param integer $workerId
     * @param integer $toolId
     * @return Tool
     */
    public function setToolWorker(int $workerId, int $toolId): Tool
    {
        $worker = $this->getWorkerById($workerId);
        $tool = $this->getToolById($toolId);

        $tool->setWorker($worker);
        $this->entityManager->persist($tool);
        $this->entityManager->flush();
        return $tool;
    }

    /**
     * Create worker
     *
     * @param string $name
     * @return Worker
     */
    public function createWorker(string $name): Worker
    {
        $worker = new Worker();
        $worker->setName($name);

        $this->entityManager->persist($worker);
        $this->entityManager->flush();
        return $worker;
    }

    /**
     * Retrive worker by id
     *
     * @param string $workerId
     * @return Worker
     */
    public function getWorkerById(int $workerId): Worker
    {
        $worker = $this->entityManager->find("App\Entities\Worker", $workerId);
        if (!$worker) {
            echo "No worker found for the given id(s).\n";
            return false;
        }
        return $worker;
    }

    /**
     * Retrive tool by id
     *
     * @param string $workerId
     * @return Tool
     */
    public function getToolById(int $toolId): Tool
    {
        $tool = $this->entityManager->find("App\Entities\Tool", $toolId);
        if (!$tool) {
            echo "No tool found for the given id(s).\n";
            return false;
        }
        return $tool;
    }

    /**
     * Create initial dataset
     *
     * @return void
     */
    public function createInitialDataset()
    {
        $this->workers = $this->generateWorkers($this->workersData);
        $this->tools = $this->generateTools();
    }

    /**
     * Create a starter dataset for Worker
     *
     * @return array
     */
    private function generateWorkers($workersData): array
    {
        $workers = [];
        foreach ($workersData as $workerData) {
            $worker = $this->createWorker($workerData['name']);
            $workers[] = $worker;
            echo "Created Worker with ID " . $worker->getId() . "\n";
        }
        return $workers;
    }

    /**
     * Generates a random name to generate the tool
     *
     * @param integer $number
     * @return string
     */
    private function randomName(int $number): string
    {
        $types = ['Hand', 'Table'];
        $names = ['stapler', 'lamp', 'hammer'];

        return $types[rand(0, count($types) - 1)] . ' ' . $names[rand(0, count($names) - 1)] . $number;
    }

    /**
     * Generates 25 random tool
     *
     * @return void
     */
    private function generateTools()
    {
        for ($i = 0; $i < 25; $i++) {

            $tool = $this->createTool(
                $this->randomName($i + 1),
                new \DateTime(date('Y-m-d', strtotime('+' . mt_rand(0, 30) . ' days'))),
                'active',
            );

            $this->setToolWorker($this->workers[rand(0, 4)]->getId(), $tool->getId());
            echo "Your new Tool Id: " . $tool->getId() . "\n";
        }
    }
}
