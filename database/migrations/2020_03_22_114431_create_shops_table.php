<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->string('shop_name')->nullable()->comment('店舗名');
            $table->string('url')->nullable()->comment('店舗URL');
            $table->string('shop_category')->nullable()->comment('店舗カテゴリー');
            $table->integer('seats')->nullable()->comment('席数');
            $table->integer('monthly_reach')->nullable()->comment('月間リーチ数');
            $table->string('counted_things')->nullable()->comment('測定タイプ');
            $table->integer('age')->nullable()->comment('年齢');
            $table->integer('male_ratio')->nullable()->comment('男性割合');
            $table->integer('famale_ratio')->nullable()->comment('女性割合');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
