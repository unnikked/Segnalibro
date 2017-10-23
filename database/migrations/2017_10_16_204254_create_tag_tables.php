<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTables extends Migration
{
  public function up()
  {
    Schema::create('tags', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->timestamps();
    });

    Schema::create('page_tag', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('page_id')->unsigned();
      $table->integer('tag_id')->unsigned();

      $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
      $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
  }

  public function down()
  {
    Schema::drop('page_tag');
    Schema::drop('tags');
  }
}
