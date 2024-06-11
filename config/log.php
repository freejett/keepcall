<?php

return [
    'allowed_ips' => explode('|', env('WHITE_IP_LIST')),
    'app_id' => [
        1 => 'service_a',
        2 => 'second_service',
    ],
    'log_parsers_classes' => [
        'service_a' => new App\Core\Log\Parsers\LogParser\ServiceLogParser,
        'second_service' => new App\Core\Log\Parsers\LogParser\SecondServiceLogParser,
    ],
    'current_storage' => 'db',
    'save_to' => [
        'db' => new App\Core\Log\Services\Storage\DBEventStorage,
        'file' => new App\Core\Log\Services\Storage\FileEventStorage,
    ],
];
