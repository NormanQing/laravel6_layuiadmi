<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionColumm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('display_name', 100)->comment('菜单名称'); // 菜单名称
            $table->tinyInteger('is_menu')->default(2)->comment('是否菜单: 1:是, 2:否'); // 是不是菜单
            $table->string('route', 100)->nullable()->comment('路由name'); // 路由名称
            $table->tinyInteger('icon_type')->default(1)->comment('图标类型 1：layui, 2:fontawesome'); // 图标
            $table->string('icon_class', 200)->nullable()->comment('图标'); // 图标
            $table->integer('parent_id')->default(0)->comment('父id'); // 父id
            $table->integer('sort')->default(0)->comment('排序'); // 排序

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('display_name'); // 回滚时移除 display_name 字段
            $table->dropColumn('is_menu'); // 回滚时移除 route 字段
            $table->dropColumn('route'); // 回滚时移除 route 字段
            $table->dropColumn('icon_type'); // 回滚时移除 icon_type 字段
            $table->dropColumn('icon_class'); // 回滚时移除 icon_class 字段
            $table->dropColumn('parent_id'); // 回滚时移除 parent_id 字段
            $table->dropColumn('sort'); // 回滚时移除 sort 字段
        });
    }
}
