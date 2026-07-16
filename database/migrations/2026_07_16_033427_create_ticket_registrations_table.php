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
        Schema::create('ticket_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('seat_category');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_registrations');
    }
};
