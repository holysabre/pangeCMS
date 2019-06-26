<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('菜单名称');
            $table->string('route')->nullable()->comment('路由');
            $table->string('permission')->nullable()->comment('权限');
            $table->string('link')->nullable()->comment('链接');
            $table->string('query')->nullable()->comment('查询');
            $table->text('params')->nullable()->comment('参数');
            $table->string('icon')->nullable()->comment('图标');
            $table->boolean('status')->default(true)->comment('状态');
            $table->integer('order')->default(0)->comment('排序');
            $table->nestedSet();
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
        Schema::dropIfExists('menus');

    }
}
