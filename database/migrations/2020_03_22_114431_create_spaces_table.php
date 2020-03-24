<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->unsignedInteger('shop_id')->comment('店舗ID');
            $table->string('name')->nullable()->comment('スペース名');
            $table->string('location')->nullable()->comment('設置場所');
            $table->string('overview')->nullable()->comment('設置概要');
            $table->string('receiving')->default(0)->comment('受入数');
            $table->string('receiving_limit')->default(1)->comment('受入上限');
            $table->string('monthly_price')->comment('月額');
            $table->softDeletes();
            $table->timestamps();
            $table->string('key', 32)->unique();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('shop_id')
            ->references('id')
            ->on('shops')
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
        Schema::dropIfExists('spaces');
    }
}
