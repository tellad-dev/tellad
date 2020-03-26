<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('space_id')->comment('広告ID');
            $table->string('form')->comment('広告形態');
            $table->string('receiving')->default(0)->comment('受入数');
            $table->string('receiving_limit')->default(1)->comment('受入上限');
            $table->integer('price')->comment('金額');
            $table->timestamps();
            $table->string('key', 32)->unique();

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
        Schema::dropIfExists('ad_forms');
    }
}
