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

            $table->foreignId('productos_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('sizes_id')
            ->constrained()
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
