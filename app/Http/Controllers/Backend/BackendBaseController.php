<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;

class BackendBaseController extends Controller
{

    public function layuiPageData($paginate, $msg = '', $extra_data = [])
    {
        return response()->json([
            'code' => 0,
            'msg' => $msg,
            'count' => $paginate->total(),
            'data' => $paginate->items(),
            'extra_data' => $extra_data,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function success($msg, $data = [])
    {
        return response()->json([
            'code' => 0,
            'msg' => $msg,
            'data' => $data,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function error($msg, $data = [])
    {
        return response()->json([
            'code' => 1,
            'msg' => $msg,
            'data' => $data,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * 菜单栏树
     * @param array $list 数据
     * @param int $parentId 父id
     * @param int $lever 层级
     * @return array
     */
    protected function menuTree(array $list = [], int $parentId = 0, $lever = 0): array
    {
        $tree = [];
        if (empty($list)) {
            $list = Permission::query()->get()->toArray(); // TODO 可以做缓存
        }

        ++$lever;
        foreach ($list as $k => $item) {
            if ($item['parent_id'] == $parentId) {
                $item['lever'] = $lever;
                $children = $this->menuTree($list, $item['id'], $lever);
                if ($children) {
                    $item['children'] = $children;
                }
                $tree[] = $item;
            }

        }

        return $tree;
    }
}
