<?php

namespace App\Factory;

use App\Factory\DbManagerFactory;

class DIContainer
{
    public function DB(): DbManagerFactory
    {
        return new DbManagerFactory();
    }
}