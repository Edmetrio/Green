<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoedaIdToPropriedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propriedades', function (Blueprint $table) {
            $table->uuid('moeda_id')->nullable();
            $table->foreign('moeda_id')->references('id')->on('moeda')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propriedades', function (Blueprint $table) {
            //
        });
    }
}
