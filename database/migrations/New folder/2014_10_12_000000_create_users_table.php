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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
             $table->foreignId('admin_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->string('name');
            // $table->unsignedBigInteger('role_id');

            $table->foreignId('role_id')->references('id')->on('user_roles')->onDelete('cascade');

            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');


            // $table->unsignedBigInteger('linemanager_id');

            $table->foreignId('linemanager_id')->references('id')->on('users')->onDelete('cascade')->nullable();



            $table->string('phone');
            $table->string('address');
            $table->string('image')->nullable();

            $table->string('username');





            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
