<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->tinyInteger('parent_id')->nullable()->comment('chứa id category parent');
                $table->string('thumbnail')->nullable();
                $table->string('slug')->unique();
                $table->mediumText('description')->nullable();
                $table->tinyInteger('status')->default(1)->comment('0. private, 1.public');
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
}
