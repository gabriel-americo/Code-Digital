<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateContatosTable.
 */
class CreateContatosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contatos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('email', 200);
            $table->string('telefone', 15);
            $table->text('mensagem');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contatos');
    }

}
