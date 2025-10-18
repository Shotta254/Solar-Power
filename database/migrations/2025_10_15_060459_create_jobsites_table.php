<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobsites', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');         //Customer name
            $table->string('location')->nullable(); //Optional address/location
            $table->unsignedInteger('stories');     //Number of stories
            $table->decimal('roof_size', 10, 2);    //Roof size in sqft
            $table->string('roof_type');            //Roof type
            $table->string('roof_material');        //Roof construction material
            $table->string('roof_condition');       //Roof condition
            $table->unsignedBigInteger('technician_id')->nullable(); //Assigned technician
            $table->timestamps();

            $table->foreign('technician_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobsites');
    }
};
