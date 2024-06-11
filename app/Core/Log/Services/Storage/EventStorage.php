<?php

namespace App\Core\Log\Services\Storage;

interface EventStorage
{
    /**
     * Сохранение события в лог нужного типа
     * @param array $event
     * @return array
     */
    public function storeEvent(array $event): array;

    public function clearStorage(): array;
}
