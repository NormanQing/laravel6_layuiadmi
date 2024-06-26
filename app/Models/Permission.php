<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function children()
    {
        return $this->hasMany('App\Models\Permission', 'parent_id', 'id');
    }
}
