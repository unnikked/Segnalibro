<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('type')->nullable();
            $table->string('version')->nullable();
            $table->string('url');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('authorName')->nullable();
            $table->string('authorUrl')->nullable();
            $table->string('providerName')->nullable();
            $table->string('providerUrl')->nullable();
            $table->string('cacheAge')->nullable();
            $table->string('thumbnailUrl')->nullable();
            $table->string('thumbnailWidth')->nullable();
            $table->string('thumbnailHeight')->nullable();
            $table->string('html')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('pages');
    }
}
