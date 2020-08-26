<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('タイトル');
            $table->string('subtitle')->nullable()->comment('サブタイトル');
            $table->string('artist')->nullable()->comment('アーティスト名');
            $table->string('image')->nullable()->comment('画像パス');
            $table->string('length')->nullable()->comment('合計時間');
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
        Schema::dropIfExists('releases');
    }
}
