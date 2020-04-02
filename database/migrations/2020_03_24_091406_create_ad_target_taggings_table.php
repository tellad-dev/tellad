<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTargetTaggingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_target_taggings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ad_id');
            $table->unsignedInteger('target_id');
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('ad_id')
            ->references('id')
            ->on('ads')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('target_id')
            ->references('id')
            ->on('targets')
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
        Schema::dropIfExists('ad_target_taggings');
    }
}
