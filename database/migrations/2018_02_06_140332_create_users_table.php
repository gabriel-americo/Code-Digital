<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            
            $table->increments('id');
            $table->char('cpf', 11)->unique()->nullable();
            $table->string('nome', 50);
            $table->char('telefone', 11);
            $table->date('nascimento')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->text('descricao')->nullable();
            $table->string('imagem', 250)->nullable();

            //auth data
            $table->string('email', 80)->unique();
            $table->string('password', 254)->nullable();

            //permission
            $table->integer('tipo')->default(2);
            $table->string('status')->default('ativo');
            $table->string('permission')->default('app.user');
            
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
