<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policies_id')->nullable();
            $table->string('tipo')->nullable();
            $table->string('aviso')->nullable();
            $table->double('comercial')->nullable();
            $table->double('neta')->nullable();
            $table->double('total')->nullable();
            $table->string('concepto')->nullable();
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
        Schema::dropIfExists('addpayments');
    }
}
