<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('分类id');
            $table->string('title')->comment('名称');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('描述');
            $table->text('content')->nullable()->comment('内容');
            $table->string('template')->nullable()->comment('模版');
            $table->integer('click_count')->default(0)->comment('点击数');
            $table->integer('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('pages');
    }
}
