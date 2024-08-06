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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->date('birth_date');
            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Foreign Keys

            $table->foreignId('address_id')->constrained('addresses');
            $table->foreignId('manager_id')->constrained('managers');
            $table->foreignId('account_id')->constrained('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
