<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName')->nullable();

            $table->integer("national_code")->nullable()->unique();

            $table->string('img')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->string('email')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('birthDate')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('field_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('type_school')->nullable();

            $table->boolean('professor_active')->default(false);
            $table->string('national_image')->nullable();
            $table->string('education_level')->nullable();
            $table->integer('field_university_id')->nullable();
            $table->integer('university_id')->nullable();
            $table->string('university_image')->nullable();
            $table->longText('tags')->nullable();
            $table->integer('bank_number')->nullable();

            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
