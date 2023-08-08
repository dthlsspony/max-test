<?php

namespace App\Console\Commands;

use App\Models\Proxy;
use App\Services\Checker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckProxyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-proxy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->proxy = Proxy::query()->where(['status' => 0])->first();
        if ($this->proxy) {
            Log::debug('Checking proxy id ' . $this->proxy->id);
            $this->proxy = Checker::check($this->proxy);
            Log::debug("Proxy {$this->proxy->id} new status {$this->proxy->status}");
        }
    }
}
