<?php

namespace App\Entity;

class Author extends BaseEntity
{
    public int $id;
    public bool $statut;
    public string $name;

    /**
     * @return bool
     */
    public function isStatut(): bool
    {
        return $this->statut;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool $statut
     */
    public function setStatut(bool $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}