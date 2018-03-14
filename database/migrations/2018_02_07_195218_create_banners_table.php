<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBannersTable.
 */
class CreateBannersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('banners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('imagem', 250);
            $table->date('data_inicio', 250)->nullable();
            $table->date('data_fim', 250)->nullable();
            $table->boolean('status');
            
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
        Schema::drop('banners');
    }

}
