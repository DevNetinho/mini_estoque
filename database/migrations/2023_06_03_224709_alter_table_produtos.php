<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function ($table){ //mudando o tipo de dados para decimal
            $table->decimal('valor_compra', 10, 2)->change();
            $table->decimal('valor_venda', 10, 2)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function ($table) { //revertendo para os tipos de dados integer 
            $table->integer('valor_compra')->change();
            $table->integer('valor_venda')->change();
        });
    }
}
