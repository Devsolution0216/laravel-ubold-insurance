<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tinsurer_id')->nullable();
            $table->string('responsable')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('year')->nullable();
            $table->integer('use_id')->nullable();
            $table->double('marketValue')->nullable();
            $table->boolean('boolGas')->nullable()->default(0);
            $table->string('prospect')->nullable();
            $table->integer('age')->nullable();
            $table->integer('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('pdf')->nullable();
            $table->double('number')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
