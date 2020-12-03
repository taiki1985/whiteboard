<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('two_letter', 5)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('name_ruby', 50)->nullable();
            $table->string('name_eng', 50)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('short_num', 4)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->boolean('saturday')->nullable();
            $table->boolean('sunday')->nullable();
            $table->boolean('national_holiday')->nullable();
            $table->boolean('ok_board')->nullable();
            $table->boolean('immigration_notice')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedInteger('created_user_id')->nullable();
            $table->unsignedInteger('updated_user_id')->nullable();
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
        Schema::dropIfExists('airlines');
    }
}
