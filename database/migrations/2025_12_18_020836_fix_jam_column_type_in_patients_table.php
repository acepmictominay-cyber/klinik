<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Change column type from TIME to VARCHAR using raw SQL
        DB::statement('ALTER TABLE `patients` MODIFY `jam` VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to TIME type
        DB::statement('ALTER TABLE `patients` MODIFY `jam` TIME NULL');
    }
};
