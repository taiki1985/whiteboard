<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->string('name_ruby', 50)->nullable();
            $table->string('name_eng', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('custom_id')->nullable();
            $table->integer('immigration_id')->nullable();
            $table->integer('quarantine_id')->nullable();
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
        Schema::dropIfExists('ports');
    }
}
