<?php

namespace app\index\controller;

use think\worker\Server;

class Worker extends Server
{
    protected $socket = 'websocket://0.0.0.0:2344';

    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {
		 foreach($connection->worker->connections as $con)
    {
        $con->send($data);
    }
	//dump($connection->worker->connections);
		/* dump($connection->worker);
        $connection->send('我收到你的信息了'); */
    }

    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {
        //echo "new connection from ip " . $connection->getRemoteIp() . "\n";
/* 		 foreach($connection->worker->connections as $con)
    {
        var_dump($con->id);
    } */
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->auth('123456');

    $connection->send(json_encode(['type'=>"getid","id"=>$connection->id]));
	var_dump($connection->id);
	var_dump($connection->getRemoteIp());

    }

    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {
        
    }

    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {
		
		
		
    }
}
