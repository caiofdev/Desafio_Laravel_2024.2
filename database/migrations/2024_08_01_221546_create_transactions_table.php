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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('title', ['depósito', 'saque', 'transferência']);
            $table->double('value');
            $table->timestamps();

            // Foreign Keys

            $table->foreignId('sender_id')->constrained('accounts');
            $table->foreignId('receiver_id')->constrained('accounts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
