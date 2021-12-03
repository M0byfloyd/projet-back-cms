<?php

namespace App\Entity;

class User extends BaseEntity
{
    public int $id;
    public bool $statut;
    public string $name;
    public string $password;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function getStatut(): bool
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

    public function isAdmin(): bool
    {
        return $this->getStatut() == 1;
    }

}