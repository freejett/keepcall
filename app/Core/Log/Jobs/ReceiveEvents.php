<?php

namespace App\Core\Log\Jobs;

use App\Core\Log\Actions\LogAction;
use App\Core\Log\Requests\StoreLogSendRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

/**
 * Джоба для получения событий из редиса и записи в БД
 */
class ReceiveEvents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $eventData;
    private LogAction $action;

    /**
     * Create a new job instance.
     */
    public function __construct(array $eventData)
    {
        $this->queue = 'events_log';
        $this->eventData = $eventData;
    }

    /**
     * @param LogAction $action
     * @return void
     * @throws BindingResolutionException
     */
    public function handle(LogAction $action): void
    {
        $action->execute($this->eventData['data']);
    }
}
