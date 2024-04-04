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
        Schema::create('donator_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('donator_name');
            $table->string('registration');
            $table->string('business_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donator_profiles');
    }
};
