<?php

use Illuminate\Database\Seeder;

class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 清空表
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Illuminate\Support\Facades\DB::table('model_has_permissions')->truncate();
        \Illuminate\Support\Facades\DB::table('model_has_roles')->truncate();
        \Illuminate\Support\Facades\DB::table('role_has_permissions')->truncate();
        \Illuminate\Support\Facades\DB::table('admins')->truncate();
        \Illuminate\Support\Facades\DB::table('roles')->truncate();
        \Illuminate\Support\Facades\DB::table('permissions')->truncate();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 创建管管理员
        $admin = \App\Models\Admin::create([
            'username' => 'root',
            'nickname' => '浪里小白条',
            'phone' => '13800000000',
            'email' => 'gogo@go.com',
            'password' => bcrypt('123456'),
            'uuid' => \Faker\Provider\Uuid::uuid(),
        ]);

        // 创建超级管理员角色
        $superRole = \App\Models\Role::create([
            'name' => '超级管理员',
            'guard_name' => 'backend'
        ]);


        //为用户添加角色
        $admin->assignRole($superRole);

        // 生成权限
        $permissionFile = glob(base_path('database/seeds/permission') . '/*.php');
        foreach ($permissionFile as $file) {
            $permission = require_once($file);

            // 生成一级权限
            $p1Val = array_intersect_key($permission, array_flip(['name', 'display_name', 'route', 'icon_class']));
            $p1Val['guard_name'] = 'backend';

            $p1 = \App\Models\Permission::create($p1Val);

            $superRole->givePermissionTo($p1); // 给角色赋予权限
            $admin->givePermissionTo($p1); // 给角色赋予权限

            // 生成二级权限
            if (isset($permission['child']) && !empty($permission['child'])) {
                foreach ($permission['child'] as $child) {
                    $p2Val = array_intersect_key($child, array_flip(['name', 'display_name', 'route', 'icon']));
                    $p2Val['parent_id'] = $p1->id;
                    $p2Val['guard_name'] = 'backend';

                    $p2 = \App\Models\Permission::create($p2Val);

                    $superRole->givePermissionTo($p2); // 给角色赋予权限
                    $admin->givePermissionTo($p2); // 给用户赋予权限

                    if (isset($child['child']) && !empty($child['child'])) {
                        // 生成三级权限
                        foreach ($child['child'] as $sun) {
                            $p3Val = array_intersect_key($sun, array_flip(['name', 'display_name', 'route', 'icon']));
                            $p3Val['parent_id'] = $p2->id;
                            $p3Val['guard_name'] = 'backend';
                            $p3 = \App\Models\Permission::create($p3Val);

                            $superRole->givePermissionTo($p3);// 给角色赋予权限
                            $admin->givePermissionTo($p2); // 给用户赋予权限
                        }
                    }

                }
            }
        }


        //初始化的角色
        $roles = [
            ['name' => '管理员', 'guard_name' => 'backend'],
            ['name' => '客服', 'guard_name' => 'backend'],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }


    }
}
