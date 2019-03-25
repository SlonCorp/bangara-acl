<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username',20);
                $table->string('first_name', 50);
                $table->string('last_name', 50);
                $table->enum('document_type', ['CED', 'RUC', 'PAS']);
                $table->string('document', 50);
                $table->string('photo', 255)->nullable();
                $table->string('email', 75);
                $table->string('password', 255);
                $table->rememberToken();
                $table->boolean('changed_password')->default(false);
                $table->boolean('enabled')->default(true);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
