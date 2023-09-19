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
        Schema::disableForeignKeyConstraints();

        Schema::create('safras', function (Blueprint $table) {
            $table->foreignUuid('empresa_id')->constrained();
            $table->foreignUuid('ano_agricula_id')->constrained();
            $table->uuid('id')->primary();
            $table->string('nome')->unique();
            $table->date('data_abertura')->nullable();
            $table->date('data_fechamento')->nullable();
            $table->string('status',1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safras');
    }
};
