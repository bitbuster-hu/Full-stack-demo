<?php

namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="worker")
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;


    /**
     * @ORM\OneToMany(targetEntity="Tool", mappedBy="worker")
     * @var Tool[] An ArrayCollection of Tool objects.
     */
    protected $assignedTools;


    public function __construct()
    {
        $this->assignedTools = new ArrayCollection();
    }


    public function assignedToTool(Tool $tool)
    {
        $this->assignedTools[] = $tool;
    }

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


}
