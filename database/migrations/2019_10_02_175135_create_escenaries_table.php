<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscenariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escenaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('insurer_id')->nullable();
            $table->integer('tproduct_id')->nullable();
            $table->string('abbreviation')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('compressive')->nullable();
            $table->string('deductibles')->nullable();
            $table->string('judicial')->nullable();
            $table->string('civil')->nullable();
            $table->string('personal')->nullable();
            $table->string('road')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('motor')->nullable();
            $table->double('gasoline')->nullable();
            $table->double('gas')->nullable();
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
        Schema::dropIfExists('escenaries');
    }
}
