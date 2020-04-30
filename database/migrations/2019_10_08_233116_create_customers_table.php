<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('people_id')->nullable();
            $table->string('first_last')->nullable();
            $table->integer('document_id')->nullable();
            $table->integer('document_num')->nullable();
            $table->string('attach_document')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('province_id')->nullable();
            $table->double('telephone')->nullable();
            $table->double('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->date('birth')->nullable();
            $table->integer('profession_id')->nullable();
            $table->string('economic')->nullable();
            $table->integer('subagent_id')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_lastname')->nullable();
            $table->string('contact_email')->nullable();
            $table->double('contact_phone')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
