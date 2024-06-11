<?php

namespace App\Core\Log\Services\Strategy;

use App\Core\Log\Services\Storage\EventStorage;

class EventStorageSelector
{
    private EventStorage $strategy;

    public function __construct(EventStorage $strategy)
    {
        $this->strategy = $strategy;
    }

    public function selectStrategy(): EventStorage
    {
        return $this->strategy;
    }
}
