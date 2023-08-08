<?php

namespace App\Jobs;

use App\Models\Proxy;
use App\Services\Checker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckProxy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Proxy $proxy;
    /**
     * Create a new job instance.
     */
    public function __construct($proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::debug("Checking proxy id: {$this->proxy->id}");
        $proxy = Checker::check($this->proxy);
        Log::debug("Proxy {$proxy->id} new status {$proxy->status}");
    }

}
