<?php

namespace App\Console\Commands\Socket;

use GatewayWorker\BusinessWorker;
use Illuminate\Console\Command;
use Workerman\Worker;

class BusinessWork extends Command
{
    use InitArgument;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:business {worker_command} {--mode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Socket Business Worker';

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
        $this->initArgv();

        $worker = new BusinessWorker();
        $worker->name = 'BusinessWorker';
        $worker->registerAddress = config('socket.register_address');
        $worker->count = config('socket.business_count');
        $worker->eventHandler = config('socket.business_event_handler');

        if (!defined('GLOBAL_START')) {
            $path = storage_path('gateway/');
            file_exists($path || @mkdir($path));
            Worker::$pidFile = $path . 'business.pid';
            Worker::runAll();
        }

    }
}
