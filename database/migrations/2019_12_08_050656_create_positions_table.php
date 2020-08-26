<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('release_id')->comment('リリースID');
            // $table->unsignedInteger('track_id')->comment('楽曲ID');
            $table->string('type')->comment('種類');
            // [種類] トラック:track 見出し:head 索引:index サブトラック:subtrack
            $table->unsignedInteger('order')->comment('表示順');
            $table->unsignedInteger('number')->nullable()->comment('ディスク順');
            $table->string('position')->nullable()->comment('曲順');
            $table->string('title')->nullable()->comment('タイトル');
            $table->string('subtitle')->nullable()->comment('サブタイトル');
            $table->string('artist')->nullable()->comment('アーティスト名');
            $table->string('length')->nullable()->comment('長さ');
            $table->timestamps();
            // 外部キー制約
            $table->foreign('release_id')->references('id')->on('releases')->onDelete('cascade');
            // $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
