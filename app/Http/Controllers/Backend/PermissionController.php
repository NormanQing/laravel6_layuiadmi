<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends BackendBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\View\View;
     */
    public function index()
    {
        return view('backend.permission.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $limit = $request->get('limit', 10);


        $model = Permission::query()->with('children')
            ->where('parent_id', 0)
            ->orderBy('sort', 'DESC')
            ->paginate($limit);


        return $this->layuiPageData($model, '请求成功');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function childrenPermission(Request $request)
    {
        $parentId = $request->get('parent_id', 0);

        $model = Permission::query()->with('children')
            ->where('parent_id', $parentId)
            ->orderBy('sort', 'DESC')
            ->get();


        return $this->success('操作失败', $model);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\View\View;
     *
     */
    public function create(Request $request)
    {
        $parentId = $request->get('parent_id', 0);

        $permissions = $this->menuTree();


        return view('backend.permission.create', compact('permissions', 'parentId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * */
    public function store(PermissionCreateRequest $request)
    {
        $requestData = $request->all();
        $data = [
            'name' => $requestData['name'],
            'display_name' => $requestData['display_name'],
            'route' => $requestData['route'],
            'guard_name' => 'backend',
            'sort' => $requestData['sort'],
            'parent_id' => $requestData['parent_id'],
            'is_menu' => $requestData['is_menu'],
            'icon_type' => $requestData['icon_type'],
            'icon_class' => $requestData['icon_class'],

        ];
        if (Permission::create($data)) {
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
        $data = Permission::query()->findOrFail($id);
        $parentId = $data->parent_id;

        $permissions = $this->menuTree();

        return view('backend.permission.edit', compact('data', 'permissions', 'parentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function update(PermissionUpdateRequest $request, int $id)
    {
        $data = $request->all();

        try {

            $admin = Permission::query()->findOrFail($id);
            $admin->name = $data['name'];
            $admin->display_name = $data['display_name'];
            $admin->route = $data['route'];
            $admin->sort = $data['sort'];
            $admin->is_menu = $data['is_menu'];
            $admin->icon_type = $data['icon_type'];
            $admin->icon_class = $data['icon_class'];
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

        if (Permission::destroy($ids)) {
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
    public function icon()
    {
        return view('backend.permission.icon');
    }

}
