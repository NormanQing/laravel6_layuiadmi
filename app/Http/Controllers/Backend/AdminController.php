<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BackendBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\View\View;
     */
    public function index()
    {
        return view('backend.admin.index');
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

        $model = Admin::query()
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
        return view('backend.admin.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * */
    public function store(AdminCreateRequest $request)
    {
        $data = $request->all();
        $data['uuid'] = \Faker\Provider\Uuid::uuid();
        $data['password'] = bcrypt($data['password']);
        if (Admin::create($data)) {
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
        $admin = Admin::query()->findOrFail($id);

        return view('backend.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $data = $request->all();

        try {

            $admin = Admin::query()->findOrFail($id);
            if ($data['password']) {
                $admin->password = bcrypt($data['password']);
            }

            $admin->username = $data['username'];
            $admin->nickname = $data['nickname'];
            $admin->phone = $data['phone'];
            $admin->email = $data['email'];
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

        if (Admin::destroy($ids)) {
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
    public function role($id)
    {
        $admin = Admin::query()->findOrFail($id);
        $roles = Role::get();
        foreach ($roles as $role) {
            $role->own = (bool)$admin->hasRole($role);
        }

        return view('backend.admin.role', compact('admin', 'roles'));
    }

    public function assignRole(Request $request, $id)
    {
        $admin = Admin::query()->findOrFail($id);
        $roles = $request->get('roles', []);

        if ($admin->syncRoles($roles)) {
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
        $admin = Admin::query()->findOrFail($id);
        $permissions = $this->menuTree();

        $permissions = $this->getAdminPermissionTree($admin, $permissions);

        return view('backend.admin.permission', compact('admin', 'permissions'));
    }

    protected function getAdminPermissionTree($admin, $permission)
    {
        foreach ($permission as $key => $item) {
            $permission[$key]['checked'] = $admin->hasDirectPermission($item['id']) ? 'checked' : '';

            if (isset($item['children'])) {
                $permission[$key]['children'] = $this->getAdminPermissionTree($admin, $item['children']);
            }
        }
        return $permission;
    }

    public function assignPermission(Request $request, $id)
    {
        $admin = Admin::query()->findOrFail($id);

        $permissions = $request->get('permissions');


        if (empty($permissions)) {
            $admin->permissions()->detach();
            return $this->success('操作成功');
        }
        $admin->syncPermissions($permissions);
        return $this->success('操作成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return  \Illuminate\View\View;
     *
     */
    public function profile()
    {
        $admin = Auth::guard('backend')->user();
        return view('backend.admin.profile', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function profileUpdate(AdminUpdateRequest $request, $id)
    {
        $data = $request->all();

        try {

            $admin = Admin::query()->findOrFail($id);
            if ($data['password']) {
                $admin->password = bcrypt($data['password']);
            }

            $admin->nickname = $data['nickname'];
            $admin->phone = $data['phone'];
            $admin->email = $data['email'];
            $admin->save();
            return $this->success('操作成功');
        } catch (\Exception $e) {
            return $this->error('操作失败' . $e->getMessage());
        }
    }
}
