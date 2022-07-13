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
        Schema::create('doacoes', function (Blueprint $table) {
            //['idDoador','descricao', 'destino', 'dataRecebimento', 'ticoDoacao']
            $table->id();

            $table->foreignId('idDoador')->references('id')->on('doadores');
            $table->string('descricao');
            $table->string('destino');
            $table->date('dataRecebimento');
            $table->string('tipoDoacao');
            
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
        Schema::dropIfExists('doacoes');
    }
};
