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
        Schema::rename('file','files'); // Rename users table to customers
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('files','file'); // Rename it back if rolling back
    }
};
