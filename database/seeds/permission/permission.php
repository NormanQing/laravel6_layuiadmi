<?php

return [
    'name' => 'permission.manage',
    'display_name' => '权限',
    'is_menu' => \App\Models\Permission::IS_MENU_YES,
    'route' => '',
    'icon_class' => 'fa fa-users-gear',
    'icon_type' => \App\Models\Permission::ICON_TYPE_FONTAWESOME,
    'child' => [
        [
            'name' => 'backend.admin',
            'display_name' => '管理员管理',
            'is_menu' => \App\Models\Permission::IS_MENU_YES,
            'route' => 'backend.admin',
            'icon_type' => \App\Models\Permission::ICON_TYPE_FONTAWESOME,
            'icon_class' => 'fa fa-user',
            'child' => [
                ['name' => 'backend.admin.create', 'display_name' => '添加','route'=>'backend.admin.create'],
                ['name' => 'backend.admin.edit', 'display_name' => '编辑','route'=>'backend.admin.edit'],
                ['name' => 'backend.admin.destroy', 'display_name' => '删除','route'=>'backend.admin.destroy'],
                ['name' => 'backend.admin.role', 'display_name' => '分配角色','route'=>'backend.admin.role'],
                ['name' => 'backend.admin.permission', 'display_name' => '分配权限','route'=>'backend.admin.permission'],
            ]
        ],
        [
            'name' => 'backend.admin.log',
            'display_name' => '管理员日志',
            'is_menu' => \App\Models\Permission::IS_MENU_YES,
            'route' => 'backend.admin.log',
            'icon_type' => \App\Models\Permission::ICON_TYPE_FONTAWESOME,
            'icon_class' => 'fa fa-list-alt',
            'child' => [
            ]
        ],
        [
            'name' => 'backend.role',
            'display_name' => '角色管理',
            'is_menu' => \App\Models\Permission::IS_MENU_YES,
            'route' => 'backend.role',
            'icon_class' => 'fa fa-user-group',
            'icon_type' => \App\Models\Permission::ICON_TYPE_FONTAWESOME,
            'child' => [
                ['name' => 'backend.role.create', 'display_name' => '添加','route'=>'backend.role.create'],
                ['name' => 'backend.role.edit', 'display_name' => '编辑','route'=>'backend.role.edit'],
                ['name' => 'backend.role.destroy', 'display_name' => '删除','route'=>'backend.role.destroy'],
                ['name' => 'backend.role.permission', 'display_name' => '分配','route'=>'backend.role.permission'],
            ]
        ],
        [
            'name' => 'backend.permission',
            'display_name' => '权限菜单',
            'is_menu' => \App\Models\Permission::IS_MENU_YES,
            'route' => 'backend.permission',
            'icon_class' => 'fa fa-bars',
            'icon_type' => \App\Models\Permission::ICON_TYPE_FONTAWESOME,
            'child' => [
                ['name' => 'backend.permission.create', 'display_name' => '添加','route'=>'backend.permission.create'],
                ['name' => 'backend.permission.edit', 'display_name' => '编辑','route'=>'backend.permission.edit'],
                ['name' => 'backend.permission.destroy', 'display_name' => '删除','route'=>'backend.permission.destroy'],
            ]
        ],
    ]
];
