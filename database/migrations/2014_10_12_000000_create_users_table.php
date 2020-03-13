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
            $table->string('password')->nullable();;
            $table->string('user_type')->nullable();
            $table->integer('facebook_id')->nullable()->unique();
            $table->string('stripe_id')->nullable()->unique()->comment('Stripeの顧客ID');
            $table->integer('status')->nullable()->comment('0が無料会員, 1が有料会員');
            $table->integer('is_deleted')->nullable()->comment('0が登録, 1が退会');
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
