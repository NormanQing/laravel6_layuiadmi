<?php

namespace App\Http\Middleware;

use App\Models\AdminOperationLog;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SetAdminOperationLog extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {

        // 判断url 是后台的地址就记录数据
        $requestUri = $request->getRequestUri(); // /backend/admin_operation_log
        $requestUri = trim($requestUri, '/');
        $urlArr = explode('/', $requestUri);
        if ($urlArr[0] == env('BACKEND_PREFIX', 'backend')) {
            $currentRouteName = $request->route()->getName(); // 当前登录的路由别名
            if(!in_array($currentRouteName, [
                'backend.login', // 登录不记录
            ])){
                $parameter = json_encode($request->all());
                $operation = new AdminOperationLog();
                $operation->ip = $request->ip();
                $operation->admin_id = $request->user('backend')->id;
                $operation->admin_name = $request->user('backend')->username;
                $operation->method = $request->method();;
                $operation->request_path = $request->getRequestUri();
                $operation->data = $parameter;
                $operation->route = $currentRouteName;
                $operation->save();
            }

        }

        return $next($request);
    }
}
