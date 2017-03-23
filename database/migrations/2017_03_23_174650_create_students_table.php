<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_board')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();

            $table->foreign('id_board')
                ->references('id')->on('boards')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('students');
    }
}
