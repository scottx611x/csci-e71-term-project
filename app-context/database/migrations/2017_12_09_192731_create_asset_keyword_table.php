<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetKeywordTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('asset_keyword', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->mediumInteger('asset_id')->unsigned();
            $table->mediumInteger('keyword_id')->unsigned();

            $table->index(["asset_id"], 'fk_asset_id_idx3');
            $table->index(["keyword_id"], 'fk_keyword_id_idx');

            $table->foreign('asset_id', 'fk_asset_id_idx3')
            ->references('id')->on('assets')
            ->onDelete('no action')
            ->onUpdate('no action');
            $table->foreign('keyword_id', 'fk_keyword_id_idx')
            ->references('id')->on('keywords')
            ->onDelete('cascade')
            ->onUpdate('no action');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('asset_keyword');
    }
}
