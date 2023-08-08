<?php

namespace App\Console\Commands;

use App\Jobs\CheckProxy;
use App\Jobs\TestJob;
use Illuminate\Console\Command;

class AddCheckWorkerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-check-worker-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Checker Thread';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new TestJob())->onQueue('test');
    }
}
