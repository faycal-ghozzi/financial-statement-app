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
        Schema::create('fs_entry_points', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type')->default('number');
            $table->string('category');  // 'Actifs' or 'Passifs'
            $table->unsignedSmallInteger('rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fs_entry_points');
    }
};
