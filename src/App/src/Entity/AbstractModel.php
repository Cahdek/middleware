<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractModel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime",
     * columnDefinition="DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP")
     *
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime",
     * columnDefinition="DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     *
     * @var DateTime
     */
    protected $modified;

    /**
     * @return number
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function getModified(): DateTime
    {
        return $this->modified;
    }

    /**
     * @param number $id
     */
    public function setId($id): AbstractModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated($created): AbstractModel
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @param DateTime $modified
     */
    public function setModified($modified): AbstractModel
    {
        $this->modified = $modified;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setDateCreated(): AbstractModel
    {
        $this->created = new DateTime();
        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateDateModified(): AbstractModel
    {
        $this->modified = new DateTime();
        return $this;
    }
}
