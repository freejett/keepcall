<?php

namespace App\Core\Log\Parsers\LogParser;

class ServiceLogParser implements LogParser
{

    /**
     * @inheritDoc
     */
    public function parse(array $logData): array
    {
        return [
            'created' => $logData['created_at'],
            'client' => $logData['client'],
            'message' => $logData['message'],
            'level' => $logData['level'],
            'user_id' => $logData['user_id'],
        ];
    }
}
