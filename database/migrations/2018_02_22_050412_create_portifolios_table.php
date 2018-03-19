<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePortifoliosTable.
 */
class CreatePortifoliosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('portifolios', function(Blueprint $table) {
            $table->increments('id');
            
            $table->integer('categoria_portifolio_id');
            $table->string('nome', 70);
            $table->string('imagem', 250);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_portifolio_id')->references('id')->on('categoria_portifolios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('portifolios');
    }

}
