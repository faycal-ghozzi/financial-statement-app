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
        Schema::create('financial_statements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies'); // Link to companies table
            $table->foreignId('entry_point_id')->constrained('fs_entry_points'); // Link to fs_entry_points
            $table->date('date');  // Current or previous year
            $table->decimal('value', 15, 3);  // Financial value for the entry
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_statements');
    }
};
