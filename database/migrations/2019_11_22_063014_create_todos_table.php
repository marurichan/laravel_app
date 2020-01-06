<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()       //マイグレーションが実行された時に実行される関数
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');//Autoincrements属性を付与したidという名前のカラム
            $table->string('title');//文字列型のTITLEというカラム
            $table->timestamps();      //created_atとupdated_atというカラムバージョン管理
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//テーブルを削除
    {
        Schema::dropIfExists('todos');
    }
}
