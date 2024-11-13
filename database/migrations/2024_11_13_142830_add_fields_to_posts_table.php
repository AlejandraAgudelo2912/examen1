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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('summary')->after('title');
            $table->string('slug')->unique()->after('body');
            $table->enum('status', ['published', 'draft', 'archived', 'pending'])->default('draft')->after('slug');
            $table->integer('reading_time')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('summary', 'slug', 'status', 'reading_time');
        });
    }
};
