<?php

use App\Models\Loja;
use App\Models\Produto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLojaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loja_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Loja::class)->references('id')->on('lojas')->onDelete('cascade');
            $table->foreignIdFor(Produto::class)->references('id')->on('produtos')->onDelete('cascade');
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
        Schema::create('loja_produto', function (Blueprint $table) {
            $table->dropForeignIdFor(Loja::class);
            $table->dropForeignIdFor(Produto::class);
        });
        Schema::dropIfExists('loja_produto');
    }
}
