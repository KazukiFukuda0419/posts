<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('handle');//ハンドルネームを任意で付けれる
            $table->string('comment');//掲示板のコメント部分
            $table->timestamps();//作成日時と更新日時を保管するフィールド
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');//指定してあった名前のテーブルがあった場合は削除する。
    }
}
