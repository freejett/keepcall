<?php

namespace App\Core\Log\Parsers\LogParser;

interface LogParser
{
    /**
     * Парсер данных. Основная функция
     * @param array $logData
     * @return array
     */
    public function parse(array $logData): array;
}
