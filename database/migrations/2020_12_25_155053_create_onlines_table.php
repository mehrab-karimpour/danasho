<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('pay-status')->nullable();
            $table->string('grade')->nullable();
            $table->string('unit')->nullable();
            $table->string('lesson')->nullable();
            $table->string('time')->nullable();
            $table->string('price')->nullable();
            $table->string('day')->nullable();
            $table->date('date')->nullable();
            $table->string('period')->nullable();
            $table->string('level')->nullable();
            $table->text('description')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('poll-status')->default(false);
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
        Schema::dropIfExists('onlines');
    }
}
