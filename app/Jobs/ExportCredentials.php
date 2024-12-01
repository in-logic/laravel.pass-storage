<?php

namespace App\Jobs;

use App\Models\Credential;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ExportCredentials implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $userID
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Resgatar arquivo

        $credentials = Credential::where('user_id', '=', $this->userID)->get()->toArray();

        // [TODO]: Create a routine to clear the temp folder, to prevent archive flooding

        Storage::disk('local')->put('/temp/credentials.json', json_encode($credentials));

        // Exportar
    }
}
