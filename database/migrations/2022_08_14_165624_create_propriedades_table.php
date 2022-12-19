<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropriedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propriedades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('tipoitem_id')->nullable();
            $table->foreign('tipoitem_id')->references('id')->on('tipoitem')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('moeda_id')->nullable();
            $table->foreign('moeda_id')->references('id')->on('moeda')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distrito')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('estado_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('estado')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('agente_id')->nullable();
            $table->foreign('agente_id')->references('id')->on('agente')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('descricao')->nullable();
            $table->string('icon')->nullable();
            $table->string('preco')->nullable();
            $table->string('estado')->default('on');
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
        Schema::dropIfExists('propriedades');
    }
}
