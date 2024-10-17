<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nif', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->bigInteger('whatsapp_number');
            $table->string('country');
            $table->string('certification_type');
            $table->string('document_type');
            $table->string('destination_country');
            $table->string('file_name');
            $table->string('check_box');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

     public function down(): void
    {
        Schema::dropIfExists('nif');
    }
};