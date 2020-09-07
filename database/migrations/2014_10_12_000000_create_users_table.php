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
            $table->string('name');
            $table->string('email')->unique();
            $table->decimal('balance')->default(0.00);
            $table->string('deposit')->default('00.00');
            $table->string('withdraw')->default('00.00');
            $table->boolean('verified')->default(0);
            $table->string('Demo_Account_balance')->default('00.00');
            $table->string('Previous_Earnings')->default('00.00');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('avatar.jpg');
            $table->string('trade_asset')->nullable();
            $table->string('trade_duration')->nullable();
            $table->string('trade_value')->default(' ');
            $table->string('demo_trade_asset')->nullable();
            $table->string('demo_trade_duration')->default('Select');
            $table->string('demo_trade_value')->default('$');
            $table->string('payment_type')->default(' ');
            $table->decimal('amount_paid')->default(0.00);
            $table->decimal('withdraw_amount')->default(0.00);
            $table->string('receiver_name')->default(' ');
            $table->string('user_bitcoin_address')->default(' ');
            $table->string('receiver_email')->default(' ');
            $table->string('bitcoin_address')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
