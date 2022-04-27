<?php

namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tool")
 */
class Tool
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $dateOfPurchase;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $state;

    /**
     * @ORM\ManyToOne(targetEntity="Worker", inversedBy="assignedTools")
     */
    protected $worker;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDateOfPurchase(\DateTime $dateOfPurchase)
    {
        $this->dateOfPurchase = $dateOfPurchase;
    }

    public function getDateOfPurchase()
    {
        return $this->dateOfPurchase;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setWorker(Worker $worker)
    {
        $worker->assignedToTool($this);
        $this->worker = $worker;
    }

    public function getWorker(): Worker
    {
        return $this->worker;
    }
}
