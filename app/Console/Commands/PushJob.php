<?php

namespace App\Console\Commands;

use App\Jobs\CreateUser;
use Illuminate\Console\Command;

class PushJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        for ($i = 0; $i < 100; $i++) {
            dispatch((new CreateUser())->onQueue('createTest'));
        }
    }
}
