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
        // Tabel roles (opsional, tetap dipertahankan)
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');

            /**
             * ROLE:
             * - admin   : full access
             * - notaris : staff (user management + operasional)
             * - user    : hasil register, tanpa akses user management
             */
            $table->enum('role', ['admin', 'staff', 'user'])->default('user');

            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');

            // Status akun
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');

            // Tambahan kolom opsional untuk fitur login langsung
            $table->rememberToken(); // untuk fitur "remember me" Laravel
            $table->timestamps();
        });

        // Reset password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Session
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
