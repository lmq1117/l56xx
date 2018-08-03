<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class sendAdEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $delay = mt_rand(1,8);
        sleep($delay);
        //$log = new Logger('sendAdEmails');
        //$log->pushHandler(new StreamHandler(storage_path('logs/sendAdEmails.log'),Logger::WARNING));
        //$log->info("本次邮件发送等待了".$delay ."秒");
        Log::info("本次邮件发送等待了".$delay ."秒");
    }
}
