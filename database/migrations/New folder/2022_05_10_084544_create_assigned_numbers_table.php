<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_numbers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');


            $table->foreignId('upload_assign_numbers_id')->references('id')->on('upload_assign_numbers')->onDelete('cascade');


            $table->string('status')->default('pending');
            $table->string('type')->default('calling');


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
        Schema::dropIfExists('assigned_numbers');
    }
};
