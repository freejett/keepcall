<?php

namespace App\Core\Log\Actions;

use App\Core\Log\Parsers\LogParser\LogParser;
use App\Core\Log\Parsers\LogParser\ServiceLogParser;
use App\Core\Log\Services\Storage\EventStorage;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use App\Core\Log\Models\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;

class LogAction
{
    /**
     * ID приложения, отправившего лог
     * (на основе ID выбирается парсер для обработки данных)
     * @var string
     */
    private string $client;

    /**
     * Класс-парсер лога событий (определяется налету)
     */
    private LogParser $logParser;

    private array $eventsLogData;

    /**
     *
     * @throws BindingResolutionException
     */
    public function execute(array $eventsLogData): array
    {
        $this->getParser($eventsLogData['client']);
        $this->eventsLogData = $this->logParser->parse($eventsLogData);

        return $this->saveEvent();
    }

    /**
     * Очистка лога
     * @return mixed
     * @throws BindingResolutionException
     */
    public function clearLog(): mixed
    {
        app()->bind(EventStorage::class, config('log.save_to.'. config('log.current_storage'))::class);
        return app()->make(EventStorage::class)->clearStorage();
    }

    /**
     * Определяем парсер
     * @param string $client
     * @return void
     * @throws BindingResolutionException
     */
    private function getParser(string $client): void
    {
        app()->bind(LogParser::class, config("log.log_parsers_classes.$client")::class);
        $this->logParser = app()->make(LogParser::class);
    }

    /**
     * Сохранение события в лог выбранного типа
     * @return array
     * @throws BindingResolutionException
     */
    private function saveEvent(): array
    {
        app()->bind(EventStorage::class, config('log.save_to.'. config('log.current_storage'))::class);
        return app()->make(EventStorage::class)->storeEvent($this->eventsLogData);
    }
}
