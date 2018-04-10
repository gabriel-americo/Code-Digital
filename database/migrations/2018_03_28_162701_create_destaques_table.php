<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDestaquesTable.
 */
class CreateDestaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destaques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icone', 50);
            $table->string('titulo', 50);
            $table->text('texto');

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
        Schema::drop('destaques');
    }
}
