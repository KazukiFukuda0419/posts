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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cat_id');
            $table->text('content');
            $table->unsignedInteger('comment_count');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->rememberToken();
            $table->timestamps();
                       
       Schema::create('comments', function($table){
                      $table->increments('id');
                      $table->unsignedInteger('post_id'); // ポストテーブルとコメントテーブルの紐付けに利用します
                      $table->string('commenter');
                      $table->text('comment');
                      $table->timestamps();
                      });
        });
        Schema::create('categories', function($table){
                       $table->increments('id');
                       $table->string('name');
                       $table->timestamps();
                       });
        Schema::create('comments', function($table){
                       $table->increments('id');
                       $table->unsignedInteger('post_id'); // ポストテーブルとコメントテーブルの紐付けに利用します
                       $table->string('commenter');
                       $table->text('comment');
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
        Schema::drop('posts');
        Schema::dropIfExists('users');
        Schema::drop('comments');
        Schema::drop('categories');
        Schema::drop('comments');
    }
}
