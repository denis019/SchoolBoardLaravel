<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_student')->unsigned();
            $table->integer('value');
            $table->timestamps();

            $table->foreign('id_student')
                ->references('id')->on('students')
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
        Schema::drop('grades');
    }
}
