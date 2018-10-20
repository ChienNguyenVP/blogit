<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admins')) {
            Schema::create('admins', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('username')->unique()->nullable();
                $table->string('avatar')->nullable();
                $table->string('full_name', 50)->nullable();
                $table->string('email')->unique();
                $table->string('password');
                $table->tinyInteger('status')->default(1)->comment('0. private, 1.public');
                $table->rememberToken();
                $table->timestamps();
            });
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
