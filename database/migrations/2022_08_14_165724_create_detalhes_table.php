<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('propriedade_id')->nullable();
            $table->foreign('propriedade_id')->references('id')->on('propriedades')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('descricao_id')->nullable();
            $table->foreign('descricao_id')->references('id')->on('descricao')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome')->nullable();
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
        Schema::dropIfExists('detalhe');
    }
}
