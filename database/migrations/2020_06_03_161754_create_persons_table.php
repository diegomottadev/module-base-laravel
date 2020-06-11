<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('nameComplete');
            $table->string('dni')->nullable();
            $table->string('cuil')->nullable();
            $table->date('burndate')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('contact_id')->nullable()->constrained();
            $table->foreignId('address_id')->nullable()->constrained();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
