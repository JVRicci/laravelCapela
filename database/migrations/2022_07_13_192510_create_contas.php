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
        Schema::create('contas', function (Blueprint $table) {
            
            //['descricao', 'valor','categoria','fornecedor','vencimento','responsavel',
            //'pagamento','formaPagamento','estado'];
            $table->id();
            $table->string('descricao');
            $table->string('valor');
            $table->string('categoria');
            $table->string('fornecedor');
            $table->string('vencimento');
            $table->string('responsavel');
            $table->date('pagamento');
            $table->string('formaPagamento');
            $table->string('estado');
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
        Schema::dropIfExists('contas');
    }
};
