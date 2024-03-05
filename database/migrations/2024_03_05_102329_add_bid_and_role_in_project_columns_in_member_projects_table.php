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
        Schema::table('member_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('bid');
            $table->string('role_in_project');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_projects', function (Blueprint $table) {
            $table->dropColumn('bid');
            $table->dropColumn('role_in_project');
        });
    }
};
