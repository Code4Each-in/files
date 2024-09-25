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
        Schema::table('files', function (Blueprint $table) {
            $table->string('unique_id')->nullable();
            $table->integer('file_count')->nullable();
            $table->string('title')->nullable();
            $table->string('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            //
            $table->dropColumn('unique_id');
            $table->dropColumn('file_count');
            $table->dropColumn('title');
            $table->dropColumn('message');
        });
    }
};
