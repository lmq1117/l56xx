<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

//实现接口，告诉Laravel将该任务推送到队列，不是立即执行
class MailQueue implements ShouldQueue
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
        //$qq = '56701117';
        $qq = '32705669';
        Mail::raw('<p>'.$qq.'</p>恭喜你于'.date('Y-m-d H:i:s',time()).'注册成功！',function ($message) use ($qq){
            $message->to($qq.'@qq.com');
    });
    }
}
