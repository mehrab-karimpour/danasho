<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('unit')->nullable();
            $table->string('lesson')->nullable();
            $table->string('question_id')->nullable();
            $table->string('question_file')->nullable();
            $table->string('get_answer_date')->nullable();
            $table->string('price')->nullable();
            $table->string('get_answer_period')->nullable();

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
        Schema::dropIfExists('offlines');
    }
}
