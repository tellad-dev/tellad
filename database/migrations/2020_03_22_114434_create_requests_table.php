<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('space_id')->comment('スペースID');
            $table->unsignedInteger('ad_id')->comment('広告ID');
            $table->unsignedInteger('sender_id')->comment('送信者ID');
            $table->unsignedInteger('receiver_id')->comment('受信者ID');
            $table->date('start_date')->nullable()->comment('希望日時');
            $table->integer('order_price')->nullable()->comment('注文価格');
            $table->string('span')->nullable()->comment('掲載期間');
            $table->integer('status')->default(0)->comment('リクエスト状況');
            $table->text('message')->nullable()->comment('メッセージ');
            $table->timestamps();

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
            
            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('receiver_id')
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
        Schema::dropIfExists('requests');
    }
}
