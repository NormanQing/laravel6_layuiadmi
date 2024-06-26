<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BackendBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\View\View;
     */
    public function index()
    {
        return view('backend.role.index');
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
        $email = $request->get('email', '');
        $phone = $request->get('phone', '');

        $model = Role::query()
            ->where('id', '<>', 1)
            ->when($username, function ($q) use ($username) {
                $q->where('username', $username);
            })
            ->when($email, function ($q) use ($email) {
                $q->where('email', $email);
            })
            ->when($phone, function ($q) use ($phone) {
                $q->where('phone', $phone);
            })
            ->orderBy('id', 'DESC')
            ->paginate($limit);

        return $this->layuiPageData($model, '请求成功');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\View\View;
     *
     */
    public function create()
    {
        return view('backend.role.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->all();
        if (Role::create($data)) {
            return $this->success('操作成功');
        }
        return $this->success('操作失败');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return  \Illuminate\View\View;
     *
     */
    public function edit($id)
    {
        $role = Role::query()->findOrFail($id);

        return view('backend.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $data = $request->all();

        try {

            $admin = Role::query()->findOrFail($id);
            $admin->name = $data['name'];
            $admin->save();
            return $this->success('操作成功');
        } catch (\Exception $e) {
            return $this->error('操作失败' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');

        if (empty($ids)) {
            return $this->error('请选择删除项目');
        }

        if (Role::destroy($ids)) {
            return $this->success('操作成功');
        }
        return $this->error('操作失败');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return  \Illuminate\View\View;
     *
     */
    public function permission($id)
    {
        $role = Role::query()->findOrFail($id);
        $permissions = $this->menuTree();

        $permissions = $this->getRolePermissionTree($role, $permissions);

        return view('backend.role.permission', compact('role', 'permissions'));
    }

    protected function getRolePermissionTree($role, $permission)
    {
        foreach ($permission as $key => $item) {
            $permission[$key]['checked'] = $role->hasDirectPermission($item['id']) ? 'checked' : '';

            if (isset($item['children'])) {
                $permission[$key]['children'] = $this->getRolePermissionTree($role, $item['children']);
            }
        }
        return $permission;
    }

    public function assignPermission(Request $request, $id)
    {
        $role = Role::query()->findOrFail($id);
        $permissions = $request->get('permissions');

        if (empty($permissions)){
            $role->permissions()->detach();
            $role->forgetCachedPermissions();
            return $this->success('操作成功');
        }
        $role->syncPermissions($permissions);
        return $this->success('操作成功');
    }

}
