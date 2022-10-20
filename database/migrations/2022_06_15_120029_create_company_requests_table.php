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
        Schema::create('company_requests', function (Blueprint $table) {

            $table->id();
             $table->string('name');
             $table->string('email');
              $table->string('phone');
              $table->string('image')->nullable();
             $table->string('company_type');
             $table->string('address')->nullable();
             $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade')->nullable();
             $table->string('status')->default(0);
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
        Schema::dropIfExists('company_requests');
    }
};
