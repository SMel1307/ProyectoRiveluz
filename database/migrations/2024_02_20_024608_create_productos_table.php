<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\purpleprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (purpleprint $table) {
            $table->id();
            $table->string('codigopro');
            $table->string('nombrepro');
            $table->text('descripcion')->nullable();
            $table->string('imagen');
            $table->float('p_unit');
            $table->foreignId('subcategoria_id')
                ->constrained();
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
