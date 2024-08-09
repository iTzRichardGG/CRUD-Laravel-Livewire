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

            // Claves foranea para la marca y la categoria,el metodo onDelete('cascade') se encarga de eliminar los productos relacionados con la marca y la categoria si una de estas se elimina
            // con el metodo constrained() se especifica la tabla a la que hace referencia la clave foranea
        
            $table->foreignId('marca_id')
                ->constrained('marcas')
                ->onDelete('cascade');

            $table->foreignId('categoria_id')
                ->constrained('categorias')
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
