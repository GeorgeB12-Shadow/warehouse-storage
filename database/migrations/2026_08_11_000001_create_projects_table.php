<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // The projects table already exists in the production database.
        // This migration is intentionally a no-op.
    }

    public function down(): void
    {
        // Do not delete the existing production table.
    }
};
