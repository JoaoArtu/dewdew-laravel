<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisksRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguel_discos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_disco');
            $table->string('cpf_cliente');
            $table->date('data_aluguel');
            $table->date('data_devolucao')->nullable();
            $table->timestamps();
            $table->foreign('cpf_cliente')->references('cpf')->on('clientes')->onDelete('cascade'); 
            $table->foreign('id_disco')->references('id')->on('discos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disks_rents');
    }
}
