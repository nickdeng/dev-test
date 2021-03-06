<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flag')->unique();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('thumb')->default('')->nullable();
            $table->integer('category_id')->default('0');
            $table->integer('user_id')->default('0');
            $table->text('content')->nullable();
            $table->integer('views')->default('0')->nullable();
            $table->integer('comments')->default('0')->nullable();
            $table->string('ipaddress')->default('0.0.0.0')->nullable();
            $table->timestamp('published_at')->index();
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
