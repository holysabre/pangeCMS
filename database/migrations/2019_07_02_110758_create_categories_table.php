<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default('0')->comment('父级id');
            $table->string('name')->comment('名称');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('描述');
            $table->string('type')->nullable()->comment('类型');
            $table->string('link')->nullable()->comment('链接');
            $table->string('thumb')->nullable()->comment('链接');
            $table->string('template')->nullable()->comment('模版');
            $table->string('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('categories');
    }
}
