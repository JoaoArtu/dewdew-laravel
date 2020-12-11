<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 60);
            $table->string('artista', 60);
            $table->string('genero', 60);
            $table->integer('ano');
            $table->integer('qtd_exemplares');
            $table->integer('qtd_disponivel');
            $table->decimal('preco', 4, 2);
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
        Schema::dropIfExists('discos');
    }
}
