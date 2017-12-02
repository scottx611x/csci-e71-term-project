<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetRepairsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('asset_repairs', function (Blueprint $table) {
            $table->unsignedMediumInteger('asset_id');
            $table->timestamps();
            $table->date('repair_date');
            $table->decimal('repair_cost', 10, 2);
            $table->text('notes');

            $table->index(["asset_id"], 'fk_asset_id_idx_from_asset_repairs');

            $table->foreign('asset_id', 'fk_asset_id_idx_from_asset_repairs')
            ->references('id')->on('assets')
            ->onDelete('no action')
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
    Schema::dropIfExists('asset_repairs');
}
}
