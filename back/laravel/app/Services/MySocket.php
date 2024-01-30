<?php

namespace App\Services;

use SocketIO;

class MySocket 
{
    protected $redis;
    protected $emitter;

    public function __construct()
    {
        $this->redis = new \Redis(); // Using the Redis extension provided client
        $this->redis->connect(env('REDIS_SOCKET_HOST', 'redis.socket'), env('REDIS_SOCKET_PORT', 6379));
        $this->emitter = new SocketIO\Emitter($this->redis);
    }

    function sendMessage($user_id)
    {
        $this->emitter->emit('sendMessage', $user_id);
    }

    function sendBlock($user_id)
    {
        $this->emitter->emit('sendBlock', $user_id);
    }

    function sendRestore($user_id)
    {
        $this->emitter->emit('sendRestore', $user_id);
    }
}