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
        Schema::create('empresas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome')->unique();
            $table->string('cnpj')->unique();
            $table->string('url')->nullable();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('logo')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitute')->nullable();
            $table->string('status',1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
