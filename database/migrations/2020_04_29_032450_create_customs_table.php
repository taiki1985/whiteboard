<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->string('name_ruby', 50)->nullable();
            $table->string('name_eng', 50)->nullable();
            $table->string('jurisdiction', 30)->nullable();
            $table->string('postcode', 7)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('short_num', 4)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 50)->nullable();
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
        Schema::dropIfExists('customs');
    }
}
