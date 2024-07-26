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

        // Schema::dropIfExists('productos');

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('sku')->unique();
            $table->decimal('precio', 10, 2);

            $table->enum ('genero', ['hombre', 'mujer', 'unisex'])->default('unisex');

            $table->foreignId('marca_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('categoria_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('path_imagen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
