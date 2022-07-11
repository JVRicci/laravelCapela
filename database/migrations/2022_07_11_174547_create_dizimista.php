<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dizimista', function (Blueprint $table) {
            $table->id();

            $table->integer('idContato')->unsigned();

            $table->integer('idEndereco')->unsigned();

            $table->string('nome');
            $table->date('nascimento');
            $table->string('cpf');
            $table->string('estadoCivil');
            $table->timestamps();

                
            $table->foreign('idContato')->references('id')->on('contato');

            $table->foreign('idEndereco')->references('id')->on('endereco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dizimista');
    }
};
