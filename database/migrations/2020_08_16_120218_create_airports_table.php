<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 5)->nullable();
            $table->string('three_letter', 5)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('name_ruby', 50)->nullable();
            $table->string('name_eng', 50)->nullable();
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
        Schema::dropIfExists('airports');
    }
}
