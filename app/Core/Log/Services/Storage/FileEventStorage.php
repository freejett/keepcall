<?php

namespace App\Core\Log\Services\Storage;

class FileEventStorage implements EventStorage
{

    public function storeEvent(array $event): array
    {
        // TODO: сохранение лога в файл
        return [
            'result' => 200
        ];
    }

    public function clearStorage(): array
    {
        // TODO: Implement clearStorage() method.
        return [
            'result' => 200
        ];
    }
}
