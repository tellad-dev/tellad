<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('space_id')->comment('スペースID');
            $table->string('path')->comment('画像パス');
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('space_id')
            ->references('id')
            ->on('spaces')
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
        Schema::dropIfExists('space_images');
    }
}
