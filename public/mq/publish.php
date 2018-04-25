<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/9
 * Time: 16:37
 */
$queueName = "mail";
$exchangeName = "mailexchange";
$routeKey = "mailrk";
$message = "hello rabbitmq!hello world!".date('Y-m-d h:i:s');

//建立一个连接
$connection = new AMQPConnection([
    'host'=>'127.0.0.1',
    'port'=>'5672',
    'vhost'=>'/',
    'login'=>'samlee',
    'password'=>'123456',
]);
$connection->connect() or die("cannot connect to the broker!\n");

//新建一个信道
$channel = new AMQPChannel($connection);

//新建一个交换机
$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);//交换机名
$exchange->setType(AMQP_EX_TYPE_DIRECT);//直连型
$exchange->setFlags(AMQP_DURABLE);//持久化的交换机
$exchange->declareExchange();

//新建一个队列
$queue = new AMQPQueue($channel);
$queue->setName($queueName);
$queue->setFlags(AMQP_DURABLE);//持久化的队列
$queue->declareQueue();

//通过routeKey绑定交换机和队列
$queue->bind($exchangeName,$routeKey);

//发送消息
$exchange->publish($message,$routeKey);

//断开连接
$connection->disconnect();























