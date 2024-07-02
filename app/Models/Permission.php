<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{

    const ICON_TYPE_LAYUI = 1; // layui icon
    const ICON_TYPE_FONTAWESOME = 2; // fontawesome icon


    const IS_MENU_YES = 1;
    const IS_MENU_NO = 2;

    public function children()
    {
        return $this->hasMany('App\Models\Permission', 'parent_id', 'id');
    }
}
