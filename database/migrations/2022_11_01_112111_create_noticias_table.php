<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('destaque_id')->nullable();
            $table->foreign('destaque_id')->references('id')->on('destaque')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('nome')->unique();
            $table->longText('descricao')->nullable();
            $table->string('icon')->nullable();
            $table->longText('texto')->nullable();
            $table->longText('texto1')->nullable();
            $table->longText('texto2')->nullable();
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
        Schema::dropIfExists('noticia');
    }
}
