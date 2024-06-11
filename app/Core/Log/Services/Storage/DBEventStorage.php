<?php

namespace App\Core\Log\Services\Storage;

use App\Core\Log\Models\Log;
use DB;

class DBEventStorage implements EventStorage
{

    public function storeEvent(array $event): array
    {
        return [
            'result' => Log::create($event)
        ];
    }

    public function clearStorage(): array
    {
        DB::table('logs')
            ->lockForUpdate()
            ->delete();

        return [
            'result' => 200
        ];
    }
}
