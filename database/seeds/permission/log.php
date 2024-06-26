<?php

return [
    'name' => 'backend.log',
    'display_name' => '日志',
    'route' => '',
    'icon_class' => 'ufa fa-solid fa-book', // fontawesome 图标 为兼容layui 必须先设置ufa 类名 html通过.ufa 控制图标位置
    'child' => [
        [
            'name' => 'backend.admin.operation_log',
            'display_name' => '后台操作日志',
            'route' => 'backend.admin.operation_log',
            'icon_class' => 'layui-icon layui-icon-list',
            'child' => [
            ]
        ],
    ]
];
