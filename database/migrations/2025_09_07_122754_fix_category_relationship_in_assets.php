<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Check if the old column exists and remove it
        if (Schema::hasColumn('assets', 'asset_category')) {
            Schema::table('assets', function (Blueprint $table) {
                $table->dropColumn('asset_category');
            });
        }   

        // Add the new category_id column if it doesn't exist
        if (!Schema::hasColumn('assets', 'category_id')) {
            Schema::table('assets', function (Blueprint $table) {
                $table->foreignId('category_id')->after('department_id')
                      ->nullable()->constrained('categories')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('assets', 'category_id')) {
            Schema::table('assets', function (Blueprint $table) {
                // Drop the column directly - this will also remove any associated foreign keys
                $table->dropColumn('category_id');
            });
        }
        
        if (!Schema::hasColumn('assets', 'asset_category')) {
            Schema::table('assets', function (Blueprint $table) {
                $table->string('asset_category', 100)->after('department_id');
            });
        }
    }
};