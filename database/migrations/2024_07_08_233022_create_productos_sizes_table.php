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
        Schema::create('productos_sizes', function (Blueprint $table) {

            $table->id();

            // Claves foraneas para la tabla productos y sizes
            // onDelete('cascade') se encarga de eliminar los productos relacionados con la tabla productos y sizes si una de estas se elimina
            // con el metodo constrained() se especifica la tabla a la que hace referencia la clave foranea
            
            $table->foreignId('productos_id')
            ->constrained('productos')
            ->onDelete('cascade');

            $table->foreignId('sizes_id')
            ->constrained('sizes')
            ->onDelete('cascade');

            $table->integer('stock');
            
            $table->unique(['productos_id', 'sizes_id']); 
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_sizes');
    }
};
