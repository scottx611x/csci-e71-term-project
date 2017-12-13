<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->unsignedMediumInteger('asset_id');
            $table->timestamps();

            $table->unsignedTinyInteger('computer_type_id');
            $table->string('memory', 30);
            $table->string('model', 30);
            $table->string('operating_system', 30);
            $table->string('mac_address', 30);

            $table->primary('asset_id');

            $table->index(["computer_type_id"], 'fk_computer_type_id_idx');

            $table->foreign('computer_type_id', 'fk_computer_type_id_idx')
            ->references('id')->on('computer_types')
            ->onDelete('cascade')
            ->onUpdate('no action');

            $table->index(["asset_id"], 'fk_asset_id_idx');

            $table->foreign('asset_id', 'fk_asset_id_idx')
            ->references('id')->on('assets')
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
        Schema::dropIfExists('computers');
    }
}
