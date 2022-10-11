<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->id(); 
            $table->string('tipo_patrimonio')->nullable();
            $table->string('num_patrimonio')->unique();
            $table->string('descricao')->nullable();
            $table->string('setor_atual')->nullable();
            $table->dateTime('date_adicionado')->nullable();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('status')->nullable();

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
        Schema::dropIfExists('patrimonios');
    }
}
