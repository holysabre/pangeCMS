<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner')->nullable()->comment('所属');
            $table->string('module')->nullable()->comment('模块');
            $table->string('section')->default('basic')->comment('分类');
            $table->string('type')->default('text')->comment('分类');
            $table->string('key')->comment('键');
            $table->text('value')->comment('值');
            $table->text('name')->comment('名称');
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
        Schema::dropIfExists('sites');
    }
}
