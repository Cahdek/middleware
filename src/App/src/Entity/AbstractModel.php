<?php

/**
 * AbstractModel that all entities inherit from
 */

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 * @ORM\MappedSuperclass
 */
class AbstractModel
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(name="created",type="datetime",nullable=false)
     *
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\Column(name="modified",type="datetime",nullable=false)
     *
     * @var DateTime
     */
    protected $modified;

    public function __construct()
    {
        $this->created  = new DateTime();
        $this->modified = new DateTime();
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return self
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of modified
     *
     * @return DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set the value of modified
     *
     * @return self
     */
    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }
}
