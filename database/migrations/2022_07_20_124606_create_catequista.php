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
        Schema::create('catequistas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('idContato')->references('id')->on('contatos');
            $table->foreignId('idEndereco')->references('id')->on('enderecos');

            $table->integer('idTurma')->nullable()->default(NULL);
            $table->string('nome');
            $table->date('nascimento');
            $table->string('ativo');
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
        Schema::dropIfExists('catequista');
    }
};
