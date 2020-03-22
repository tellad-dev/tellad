<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('type')->nullable()->comment('0がゲスト, 1がホスト');
            $table->unsignedInteger('facebook_id')->nullable()->unique();
            $table->string('stripe_id')->nullable()->unique()->comment('Stripeの顧客ID');
            $table->integer('status')->nullable()->comment('0が無料会員, 1が有料会員');
            $table->timestamp('last_login_at')->nullable()->comment('退会日時');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
