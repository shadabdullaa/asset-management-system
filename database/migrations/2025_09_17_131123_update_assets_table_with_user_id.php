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
        // To avoid issues with existing data, we'll nullify the column first.
        \Illuminate\Support\Facades\DB::table('assets')->update(['with_whom' => null]);

        Schema::table('assets', function (Blueprint $table) {
            $table->renameColumn('with_whom', 'user_id');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->string('user_id')->nullable()->change();
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->renameColumn('user_id', 'with_whom');
        });
    }
};