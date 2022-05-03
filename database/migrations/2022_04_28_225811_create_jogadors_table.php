<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Clube;
use App\Models\Posicao;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
			$table->string("nome", 100);
			$table->date("dataNascimento");
			$table->foreignIdFor(Clube::class);
			$table->foreignIdFor(Posicao::class);
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
        Schema::dropIfExists('jogador');
    }
};
