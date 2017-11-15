<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->timestamps();
            $table->string('address1', 50);
            $table->string('address2', 50)->nullable();
            $table->string('city', 30);
            $table->char('state', 2);
            $table->string('zip', 12);
            $table->string('company', 40);
            $table->string('email', 60)->nullable();
            $table->string('phone', 14);
            $table->string('fax', 14)->nullable();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
