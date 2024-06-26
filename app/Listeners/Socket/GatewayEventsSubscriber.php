<?php

namespace App\Listeners\Socket;

use App\Events\Socket\OnCloseEvent;
use App\Events\Socket\OnConnectEvent;
use App\Events\Socket\OnMessageEvent;
use App\Services\SocketService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GatewayEventsSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function subscribe($events){
        $events->listen(
            OnConnectEvent::class,
            self::class. '@onConnect'
        );
        $events->listen(
            OnCloseEvent::class,
            self::class. '@onClose'
        );
        $events->listen(
            OnMessageEvent::class,
            self::class. '@onMessage'
        );
    }

    public function onConnect($event){
//        \GatewayWorker\Lib\Gateway::sendToAll('client_id:'. $event->clientId . 'is comming');
    }

    public function onClose($event){
    }

    public function onMessage($event){
        SocketService::messageHandler($event);
    }
}
