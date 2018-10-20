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
            $table->string('full_name', 50)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('is_admin')->default(0)->comment('0. is not admin, 1.is admin');
            $table->string('username')->nullable()->comment('Username');
            $table->mediumText('avatar')->nullable();
             $table->string('phone_number')->nullable();
             $table->tinyInteger('status')->default(1)->comment('0.private 1public');
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
