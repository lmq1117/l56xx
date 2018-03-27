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
        //命令执行期间交互输入一些信息
        //$name = $this->ask('What is your name ?');

        //获取命令执行的参数
        $user_qq = $this->argument('user');

        //发送邮件
        //$this->drip->TestSentMail($user_qq);

        $this->info('你输入的QQ号是：' . $user_qq);
        //if($user_qq == '3651967') $this->error("你已经给 " . $user_qq ." 发送过邮件啦！请不要短时间内再次发送！");

        $headers = ['用户名','邮箱地址'];
        $users = [
            ['风清扬','56701117@qq.com'],
            ['李明权','3651967@qq.com'],
        ];
        $this->table($headers, $users);
    }
}
