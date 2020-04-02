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
            $table->unsignedInteger('shop_id')->comment('店舗ID');
            $table->string('name')->nullable()->comment('スペース名');
            $table->string('location')->nullable()->comment('設置場所');
            $table->string('overview')->nullable()->comment('設置概要');
            $table->softDeletes();
            $table->timestamps();
            $table->string('key', 32)->unique();

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
