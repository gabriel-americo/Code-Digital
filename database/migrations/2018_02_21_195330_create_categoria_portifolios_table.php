<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCategoriaPortifoliosTable.
 */
class CreateCategoriaPortifoliosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categoria_portifolios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 70);
            $table->string('url', 70);

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
        Schema::drop('categoria_portifolios');
    }

}
