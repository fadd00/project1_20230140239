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
        if (Schema::hasColumn('categories', 'user_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
            });
        }

        if (Schema::hasColumn('categories', 'product_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('product_id');
            });
        }

        if (! Schema::hasColumn('categories', 'name')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('name');
            });
        }

        Schema::table('categories', function (Blueprint $table) {
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('categories', 'name')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropUnique(['name']);
            });
        }

        if (! Schema::hasColumn('categories', 'user_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            });
        }

        if (! Schema::hasColumn('categories', 'product_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
            });
        }
    }
};
