<?php
    namespace App\Entity;

class BaseEntity
{
    public function __construct(array $data = []) {
        $this->hydrate($data);
    }

    private function hydrate(array $data) {
    }
}