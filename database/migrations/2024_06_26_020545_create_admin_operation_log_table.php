<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminOperationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_operation_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id');
            $table->string('admin_name',20);
            $table->string('method',20)->comment('方法');
            $table->string('ip',120);
            $table->string('request_path')->comment('请求路径');
            $table->string('data')->comment('请求参数');
            $table->string('route')->comment('路由别名');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_operation_logs', function (Blueprint $table) {
            Schema::dropIfExists('admin_operation_logs');
        });
    }
}
