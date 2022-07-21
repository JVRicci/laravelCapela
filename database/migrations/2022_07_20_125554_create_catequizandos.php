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
        Schema::create('catequizandos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('idContato')->references('id')->on('contatos');
            $table->foreignId('idEndereco')->references('id')->on('enderecos');
            $table->foreignId('idResponsavel')->references('id')->on('responsavels');

            $table->integer('idTurma');
            $table->string('nome');
            $table->date('nascimento');
            $table->integer('faltas')->nullable()->default(NULL);
            $table->string('ativo')->nullable()->default(NULL);
            $table->string('turma')->nullable()->default(NULL);
            $table->integer('faltaEncontro')->nullable()->default(NULL);
            $table->integer('faltaMissa')->nullable()->default(NULL);
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
        Schema::dropIfExists('catequizandos');
    }
};
