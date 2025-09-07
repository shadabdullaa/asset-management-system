<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('asset_name');
            $table->unsignedBigInteger('category_id'); // Just create the category_id column, don't add FK constraint here
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->unique();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry')->nullable();
            $table->decimal('cost', 12, 2)->nullable();
            $table->enum('condition', ['new','good','fair','poor'])->default('good');
            $table->enum('status', ['active','in_use','maintenance','retired'])->default('active');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('with_whom')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Drop asset_maintenances first to avoid FK constraint error
        Schema::dropIfExists('asset_maintenances');
        Schema::dropIfExists('assets');
    }
};
