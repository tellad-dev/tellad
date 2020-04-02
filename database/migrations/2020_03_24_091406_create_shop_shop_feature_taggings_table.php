<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShopFeatureTaggingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shop_feature_taggings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('shop_feature_id');
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('shop_id')
            ->references('id')
            ->on('shops')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('shop_feature_id')
            ->references('id')
            ->on('shop_features')
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
        Schema::dropIfExists('shop_shop_feature_taggings');
    }
}
