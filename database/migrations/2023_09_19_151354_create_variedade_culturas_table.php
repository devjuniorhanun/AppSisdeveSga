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

        Schema::create('variedade_culturas', function (Blueprint $table) {
            $table->foreignUuid('empresa_id')->constrained();
            $table->foreignUuid('cultura_id')->constrained();
            $table->uuid('id')->primary();
            $table->string('nome')->unique();
            $table->string('tecnologia')->nullable();
            $table->string('ciclo')->nullable();
            $table->double('qnt_estoque', 10, 2)->nullable();
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
        Schema::dropIfExists('variedade_culturas');
    }
};
