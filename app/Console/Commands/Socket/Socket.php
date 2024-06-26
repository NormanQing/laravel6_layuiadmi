<?php

namespace App\Console\Commands\Socket;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Workerman\Worker;

class Socket extends Command
{
    use InitArgument;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:run {worker_command} {--mode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function init()
    {
        define('GLOBAL_START', true);
        $this->InitArgv();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->init();
        $path = storage_path('gateway/');
        file_exists($path) || @mkdir($path);

        $command = $this->argument('worker_command');

        if ($command == 'start') {
            file_exists($path . 'register.pid') || Artisan::call('socket:register', ['worker_command' => $command]);
            file_exists($path . 'gateway.pid') || Artisan::call('socket:gateway', ['worker_command' => $command]);
            file_exists($path . 'business.pid') || Artisan::call('socket:business', ['worker_command' => $command]);
//            file_exists($path . 'channel.pid') || Artisan::call('socket:channel', ['worker_command' => $worker_command]);
        } else {
            Artisan::call('socket:register', ['worker_command' => $command]);
            Artisan::call('socket:gateway', ['worker_command' => $command]);
            Artisan::call('socket:business', ['worker_command' => $command]);
//            Artisan::call('socket:channel', ['worker_command' => $command]);
        }
        Worker::$pidFile = $path . 'socket.pid';
        Worker::runAll();

    }
}
