<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('chassis')->nullable();
            $table->string('enrollment')->nullable();
            $table->string('color')->nullable();
            $table->string('circulation')->nullable();
            $table->integer('fuel_id')->nullable();
            $table->string('ndoor')->nullable();
            $table->integer('use_id')->nullable();
            $table->string('condition')->nullable();
            $table->string('risk')->nullable();
            $table->string('passengers')->nullable();
            $table->string('cylinders')->nullable();
            $table->string('peso')->nullable();

            $table->integer('customer_id')->nullable();

            $table->integer('insurer_id')->nullable();
            $table->integer('tproduct_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->date('create_date')->nullable();
            $table->date('activation_date')->nullable();
            $table->date('star_date')->nullable();
            $table->date('final_date')->nullable();
            $table->string('policies_id')->nullable();
            $table->string('external')->nullable();
            $table->string('internal')->nullable();
            $table->double('amount')->nullable();
            $table->double('marketValue')->nullable();
            $table->double('annual')->nullable();
            $table->double('net')->nullable();
            $table->double('month')->nullable();
            $table->double('isc')->nullable();
            $table->integer('plan')->nullable();
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
        Schema::dropIfExists('policies');
    }
}
