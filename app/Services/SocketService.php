<?php

namespace App\Services;

use GatewayWorker\Lib\Gateway;

class SocketService
{
    public static function messageHandler($event)
    {
        $message = $event->message;
        $clientId = $event->clientId;

        $data = json_decode($message, true);

        if($data && is_array($data)){
            if(isset($data['action'])){
                $event = ucfirst($data['action']);
                $method = "do{$event}";
                method_exists(self::class, $method) && call_user_func_array([self::class, $method], [$clientId, $data]);
            }else{
                echo date('Y-m-d H:i:s') . ' 接收到未知的消息体2222:' . PHP_EOL;
                dump($message);
            }
        }else{
            echo date('Y-m-d H:i:s') . ' 接收到未知的消息体111:' . PHP_EOL;
            dump($message);
        }
    }

    /**
     * 用户登录
     *
     * @param string $token
     * @param string $client_id
     *
     * @return boolean
     */
    public static function doLogin($client_id, $message)
    {
        $user_id = $message['params'];


        Gateway::bindUid($client_id, $user_id);
        $send_data = [
            'type' => 'login_result',
            'code' => 1,
            'msg' => '登录成功',
        ];

        //
        Gateway::sendToClient($client_id, json_encode($send_data));
        return true;
    }

    public static function doSub($client_id, $message)
    {
        $params = strtoupper($message['params']);
        Gateway::joinGroup($client_id, $params);
        Gateway::sendToClient($client_id, json_encode(['action' => 'sub_result', 'msg' => '订阅成功' . $params]));
    }

    public static function dotest($client_id, $message)
    {
        $params = strtoupper($message['params']);
        $uid = Gateway::getUidListByGroup('TEST-GROUP');
        var_dump($uid);
        $notSendClientIdByUid = Gateway::getClientIdByUid('111');
        $notSendArr = [];
        foreach ($notSendClientIdByUid as $v){
            $notSendArr[] = $v;
        }
        var_dump($notSendClientIdByUid);
        $resultMsg = ['type' => 'test_result', 'data' => $notSendClientIdByUid, 'msg' => '订阅成功' . $params];
        Gateway::sendToGroup('TEST-GROUP', json_encode($resultMsg), $notSendArr);
//        Gateway::sendToClient($client_id,json_encode(['type'=> 'test_result','data'=>$uid ,'msg'=> '订阅成功' . $params]));
    }
}
