<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('姓名');
            $table->integer('member_role_id')->comment('角色');
            $table->integer('parent_id')->nullable()->comment('上级会员');
            $table->bigInteger('phone')->unique()->comment('手机号码');
            $table->string('card_number',18)->comment('身份证号码');
            $table->string('card_image_front')->comment('身份证照片正面');
            $table->string('card_image_back')->comment('身份证照片反面');
            $table->enum('sex',['male','female'])->comment('性别');
            $table->string('qrcode')->nullable()->comment('二维码');
            $table->integer('user_id')->nullable()->comment('归属管理员');
            $table->enum('status',['active','freeze'])->comment('状态');
            $table->string('token')->nullable()->comment('Token');
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
        Schema::dropIfExists('members');
    }
}
