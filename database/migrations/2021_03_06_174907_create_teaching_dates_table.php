<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachingDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('index');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('date_period_id')->default(null);
            $table->string('key');
            $table->string('datePersian')->default(null);
            $table->date('date')->default(null);
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
        Schema::dropIfExists('teaching_dates');
    }
}
