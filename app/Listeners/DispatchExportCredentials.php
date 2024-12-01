<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ExportCredentials;
use App\Events\RequestExportCredentials;

class DispatchExportCredentials
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RequestExportCredentials $event): void
    {
        ExportCredentials::dispatch($event->userID);
    }
}
