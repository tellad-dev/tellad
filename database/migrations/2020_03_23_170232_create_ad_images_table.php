<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ad_id')->comment('広告ID');
            $table->string('path')->comment('画像パス');
            $table->timestamps();
            $table->string('key', 32)->unique();

            $table->foreign('ad_id')
            ->references('id')
            ->on('ads')
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
        Schema::dropIfExists('ad_images');
    }
}
