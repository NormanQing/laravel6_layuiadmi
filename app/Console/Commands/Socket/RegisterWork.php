<?php

namespace App\Console\Commands\Socket;

use GatewayWorker\Register;
use Illuminate\Console\Command;
use Workerman\Worker;

class RegisterWork extends Command
{
    use InitArgument;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:register {worker_command} {--mode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Socket Register Worker';

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

        $registerAdder = config('socket.register_address');
        new Register('Text://' . $registerAdder);
        if (!defined('GLOBAL_START')) {
            $path = storage_path('getway/');
            file_exists($path) || @mkdir($path);
            Worker::$pidFile = $path . 'register.pid';
            Worker::runAll();
        }
    }
}
