<?php

return [
    'name' => 'system.manage',
    'display_name' => '系统管理',
    'route' => '',
    'icon_class' => 'ufa fa fa-solar-panel', // fontawesome 图标 为兼容layui 必须先设置ufa 类名 html通过.ufa 控制图标位置
    'child' => [
        [
            'name' => 'system.admin',
            'display_name' => '用户管理',
            'route' => 'backend.admin',
            'icon_class' => 'layui-icon layui-icon-windows',
            'child' => [
                ['name' => 'system.admin.create', 'display_name' => '添加用户','route'=>'backend.admin.create'],
                ['name' => 'system.admin.edit', 'display_name' => '编辑用户','route'=>'backend.admin.edit'],
                ['name' => 'system.admin.destroy', 'display_name' => '删除用户','route'=>'backend.admin.destroy'],
                ['name' => 'system.admin.role', 'display_name' => '分配角色','route'=>'backend.admin.role'],
                ['name' => 'system.admin.permission', 'display_name' => '分配权限','route'=>'backend.admin.permission'],
            ]
        ],
        [
            'name' => 'system.role',
            'display_name' => '角色管理',
            'route' => 'backend.role',
            'icon_class' => 'layui-icon layui-icon-windows',
            'child' => [
                ['name' => 'system.role.create', 'display_name' => '添加角色','route'=>'backend.role.create'],
                ['name' => 'system.role.edit', 'display_name' => '编辑角色','route'=>'backend.role.edit'],
                ['name' => 'system.role.destroy', 'display_name' => '删除角色','route'=>'backend.role.destroy'],
                ['name' => 'system.role.permission', 'display_name' => '分配权限','route'=>'backend.role.permission'],
            ]
        ],
        [
            'name' => 'system.permission',
            'display_name' => '权限管理',
            'route' => 'backend.permission',
            'icon_class' => 'layui-icon layui-icon-windows',
            'child' => [
                ['name' => 'system.permission.create', 'display_name' => '添加权限','route'=>'backend.permission.create'],
                ['name' => 'system.permission.edit', 'display_name' => '编辑权限','route'=>'backend.permission.edit'],
                ['name' => 'system.permission.destroy', 'display_name' => '删除权限','route'=>'backend.permission.destroy'],
            ]
        ],
    ]
];
