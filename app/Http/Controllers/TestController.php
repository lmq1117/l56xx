<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{

    public function rds()
    {
        $user = Redis::get('name');
        return $user;
    }

    public function send()
    {
        $content = "纯文本邮件测试" . date('Y-m-d H:i:s');
        $flag = Mail::raw($content, function ($message) {
            $to = '56701117@qq.com';
            $message->to($to)->subject("纯文本邮件测试");
        });
        if (!$flag) {
            return '发送邮件成功，请查收！';
        } else {
            return '发送邮件失败，请重试！';
        }
    }
}
