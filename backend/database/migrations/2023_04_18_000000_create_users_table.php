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
            $table->string('name')->collation('NOCASE');
            $table->string('cpf')->unique();
            $table->string('email')->collation('NOCASE');
            $table->string('address')->collation('NOCASE');
            $table->string('cep');
            $table->string('password_hash');
            $table->integer('permissions');
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
