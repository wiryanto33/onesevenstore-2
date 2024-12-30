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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('point')->default(0)->after('password'); // Kolom poin dengan default 0
            $table->enum('user_type', ['stockist', 'distributor', 'agen', 'reseller', 'umum'])->default('umum')->after('point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('point');
            $table->dropColumn('user_type');
        });
    }
};
