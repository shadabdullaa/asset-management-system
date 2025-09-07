<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // First, remove the old asset_category column
        Schema::table('assets', function (Blueprint $table) {
            if (Schema::hasColumn('assets', 'asset_category')) {
                $table->dropColumn('asset_category');
            }
        });

        // Add the new category_id column as foreign key only if it doesn't exist
        Schema::table('assets', function (Blueprint $table) {
            if (!Schema::hasColumn('assets', 'category_id')) {
                $table->foreignId('category_id')->after('department_id')
                      ->constrained('categories')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            if (Schema::hasColumn('assets', 'category_id')) {
                $table->dropColumn('category_id');
            }
        });

        Schema::table('assets', function (Blueprint $table) {
            if (!Schema::hasColumn('assets', 'asset_category')) {
                $table->string('asset_category', 100)->after('department_id');
            }
        });
    }
};