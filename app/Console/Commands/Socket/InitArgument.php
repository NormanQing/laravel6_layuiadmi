<?php

namespace App\Console\Commands\Socket;

trait InitArgument
{
    public function InitArgv()
    {
        global $argv;
        $argv[1] = $this->argument('worker_command');
        $mode = $this->option('mode');

        isset($mode) && $argv[2] = '-' . $mode;
    }

}
