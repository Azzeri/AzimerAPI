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
        Schema::create('fire_brigade_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('superior_fire_brigade_unit_id')->nullable()->constrained('fire_brigade_units');
            $table->string('name', 255);
            $table->softDeletes('deleted_at');
            $table->timestamps();
            $table->comment('Fire brigade units managed by the application');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fire_brigade_units');
    }
};
