<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('addressable');
            $table->unsignedInteger('postcode')->nullable()->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('住所（県）');
            $table->string('city')->nullable()->comment('住所（市町村）');
            $table->string('block')->nullable()->comment('住所（番地、部屋番号）');
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
        Schema::dropIfExists('addresses');
    }
}
