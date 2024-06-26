<?php

namespace App\Console\Commands\Socket;

use GatewayWorker\Gateway;
use Illuminate\Console\Command;
use Workerman\Worker;

class GatewayWork extends Command
{
    use InitArgument;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:gateway {worker_command} {--mode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Socket Gateway Worker';

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
        $this->InitArgv();

        $gatewayScoket = config('socket.gateway_socket');
        $registerAddress = config('socket.register_address');

        $gateway = new Gateway($gatewayScoket);
        $gateway->name = 'Gateway';
        $gateway->count = config('socket.gateway_count', 1);
        $gateway->lanIp = config('socket.gateway_lan_ip', '127.0.0.1');
        $gateway->startPort = config('socket.gateway_start_port');
        $gateway->registerAddress = $registerAddress;

        if(!defined('GOLBAL_START')){
            $path = storage_path('gateway/');
            file_exists($path) || @mkdir($path);
            Worker::$pidFile = $path . 'gateway.pid';
            Worker::runAll();
        }
    }
}
