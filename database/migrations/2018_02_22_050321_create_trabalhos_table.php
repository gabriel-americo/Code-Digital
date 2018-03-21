<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTrabalhosTable.
 */
class CreateTrabalhosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('trabalhos', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('nome', 50);
            $table->string('imagem', 250);
            $table->text('descricao')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('trabalhos');
    }

}
