<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produtos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nomeProduto');
          $table->integer('numeroProduto');
          $table->boolean('ativo');
          $table->string('imagemProduto', 200)->nullable();
          $table->enum('category', ['eletronicos', 'moveis', 'limpeza', 'banho']);
          $table->string('descricaoProduto');
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
        Schema::drop('produtos');
    }
}
