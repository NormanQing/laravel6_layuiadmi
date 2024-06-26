<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\AdminOperationLog;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminOPerationLogController extends BackendBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\View\View;
     */
    public function index()
    {
        return view('backend.admin_operation_log.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $limit = $request->get('limit', 10);

        $username = $request->get('username', '');
        $ip = $request->get('ip', '');
        $method = $request->get('method', '');
        $route = $request->get('route', '');

        $model = AdminOperationLog::query()
            ->when($username, function ($q) use ($username) {
                $q->where('username', $username);
            })
            ->when($ip, function ($q) use ($ip) {
                $q->where('ip', $ip);
            })
            ->when($route, function ($q) use ($route) {
                $q->where('route', $route);
            })
            ->when($method, function ($q) use ($method) {
                $q->where('method', $method);
            })
            ->orderBy('id', 'DESC')
            ->paginate($limit);

        return $this->layuiPageData($model, '请求成功');

    }
}
