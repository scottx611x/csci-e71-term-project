<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->timestamps();
            $table->string('description', 50)->nullable();
            $table->mediumInteger('quantity')->default('1');
            $table->decimal('purchase_price', 10, 2);
            $table->date('purchase_date');
            $table->string('funding_source', 50);
            $table->decimal('percent_federal_participation', 5, 2)->nullable()->default('0');
            $table->unsignedTinyInteger('group_id');
            $table->string('serial_number', 50)->nullable();;
            $table->unsignedTinyInteger('location_id');
            $table->unsignedTinyInteger('warranty_id')->nullable();;
            $table->string('notes', 191)->nullable();
            $table->unsignedTinyInteger('estimated_life_months');
            $table->boolean('is_out_of_service')->default('0');
            $table->unsignedTinyInteger('out_of_service_id')->nullable();
            $table->date('out_of_service_date')->nullable();
            $table->unsignedTinyInteger('vendor_id')->nullable();;
            $table->string('assigned_to', 30);
            $table->date('assigned_date');
            $table->string('owner', 50)->default('Alpine Academy');
            $table->boolean('is_computer')->default('0');
            $table->string('tag', 10)->nullable();;
            $table->smallInteger('scheduled_retirement_year');

            $table->index(["out_of_service_id"], 'fk_out_of_service_id_idx');
            $table->index(["vendor_id"], 'fk_vendor_id_idx');
            $table->index(["group_id"], 'fk_group_id_idx');
            $table->index(["location_id"], 'fk_location_id_idx');
            $table->index(["warranty_id"], 'fk_warranty_id_idx');

            $table->foreign('group_id', 'fk_group_id_idx')
                ->references('id')->on('groups')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('location_id', 'fk_location_id_idx')
                ->references('id')->on('locations')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('warranty_id', 'fk_warranty_id_idx')
                ->references('id')->on('warranties')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('vendor_id', 'fk_vendor_id_idx')
                ->references('id')->on('vendors')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('out_of_service_id', 'fk_out_of_service_id_idx')
                ->references('id')->on('out_of_service_codes')
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
        Schema::dropIfExists('assets');
    }
}
