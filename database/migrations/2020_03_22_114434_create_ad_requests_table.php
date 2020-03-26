<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID（送信者)');
            $table->unsignedInteger('space_id')->comment('スペースID');
            $table->unsignedInteger('ad_id')->comment('広告ID');
            $table->date('start_date')->nullable()->comment('希望日時');
            $table->integer('order_price')->nullable()->comment('注文価格');
            $table->string('span')->nullable()->comment('掲載期間');
            $table->integer('status')->default(0)->comment('リクエスト状況');
            $table->text('message')->nullable()->comment('メッセージ');
            $table->timestamps();
            $table->string('key', 32)->unique();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('space_id')
            ->references('id')
            ->on('spaces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
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
        Schema::dropIfExists('ad_requests');
    }
}
