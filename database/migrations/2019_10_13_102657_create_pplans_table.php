<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pplans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policies_id')->nullable();
            $table->integer('cuota_num')->nullable();
            $table->string('coupon_num')->nullable();
            $table->date('expiration_date')->nullable();
            $table->double('amount')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('bill')->nullable();
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('pplans');
    }
}
