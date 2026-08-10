<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Customers
        |--------------------------------------------------------------------------
        */
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('tax_id')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Projects
        |--------------------------------------------------------------------------
        */
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')
                ->constrained('customers')
                ->cascadeOnDelete();

            $table->string('project_name');
            $table->string('project_code')->nullable()->unique();
            $table->text('description')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Storage Locations
        |--------------------------------------------------------------------------
        */
        Schema::create('storage_locations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_id')
                ->constrained('projects')
                ->cascadeOnDelete();

            $table->string('warehouse', 100);
            $table->string('zone', 50)->nullable();
            $table->string('rack', 50)->nullable();
            $table->string('location_code', 100);

            $table->decimal('capacity', 12, 2)->default(0);
            $table->decimal('occupied', 12, 2)->default(0);

            $table->string('unit')->default('sqm');
            $table->string('status')->default('available');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->unique([
                'warehouse',
                'zone',
                'rack',
                'location_code'
            ]);
        });

        /*
        |--------------------------------------------------------------------------
        | Invoices
        |--------------------------------------------------------------------------
        */
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')
                ->constrained('customers')
                ->cascadeOnDelete();

            $table->foreignId('project_id')
                ->constrained('projects')
                ->cascadeOnDelete();

            $table->string('invoice_no')->unique();

            $table->date('invoice_date');
            $table->date('due_date')->nullable();

            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('vat', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            $table->string('status')->default('unpaid');

            $table->text('notes')->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Invoice Items
        |--------------------------------------------------------------------------
        */
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->cascadeOnDelete();

            $table->string('description');

            $table->decimal('quantity', 12, 2)->default(1);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->decimal('amount', 12, 2)->default(0);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Payments
        |--------------------------------------------------------------------------
        */
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->cascadeOnDelete();

            $table->date('payment_date');

            $table->decimal('amount', 12, 2);

            $table->string('payment_method')->nullable();

            $table->string('reference_no')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('storage_locations');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('customers');
    }
};
