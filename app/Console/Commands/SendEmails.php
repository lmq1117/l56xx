<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TestController;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送邮件到user用户';
    protected $drip;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TestController $drip)
    {
        parent::__construct();
        $this->drip = $drip;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->drip->TestSentMail('56701117');
    }
}
