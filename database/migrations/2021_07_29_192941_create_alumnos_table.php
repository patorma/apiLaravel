<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',255);
            $table->string('lastname',255);
            $table->string('email',255)->unique();
            $table->enum('state',['paid','pending'])->default('pending');
            $table->boolean('peruvian');
            $table->boolean('assistance');
            $table->string('phone',15);
            $table->unsignedBigInteger('idCompany');

            $table->foreign('idCompany')
                ->references('id')
                ->on('empresas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
