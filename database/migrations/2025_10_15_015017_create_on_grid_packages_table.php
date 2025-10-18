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
        Schema::create('on_grid_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('solar_panel_id')->constrained('inventory_items')->onDelete('cascade');
            $table->foreignId('inverter_id')->constrained('inventory_items')->onDelete('cascade');
            $table->foreignId('pv_production_meter_id')->constrained('inventory_items')->onDelete('cascade');
            $table->foreignId('main_panel_id')->constrained('inventory_items')->onDelete('cascade');
            $table->foreignId('electricity_meter_id')->constrained('inventory_items')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_grid_packages');
    }
};
