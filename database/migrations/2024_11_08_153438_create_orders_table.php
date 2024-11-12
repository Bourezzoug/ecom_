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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->string('status');
            $table->decimal('total_price', 6, 2);
            $table->string('session_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('family_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('city');
            $table->string('country');
            $table->string('state_province');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
