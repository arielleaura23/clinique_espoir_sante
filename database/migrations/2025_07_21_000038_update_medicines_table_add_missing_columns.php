<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMedicinesTableAddMissingColumns extends Migration
{
public function up(): void
{
    Schema::table('medicines', function (Blueprint $table) {
        if (!Schema::hasColumn('medicines', 'dosage')) {
            $table->string('dosage')->nullable()->after('image');
        }
        if (!Schema::hasColumn('medicines', 'expiration_date')) {
            $table->date('expiration_date')->nullable()->after('dosage');
        }
        if (!Schema::hasColumn('medicines', 'form')) {
            $table->string('form')->nullable()->after('expiration_date');
        }
        if (!Schema::hasColumn('medicines', 'manufacturer')) {
            $table->string('manufacturer')->nullable()->after('stock_quantity');
        }
        if (!Schema::hasColumn('medicines', 'instructions')) {
            $table->text('instructions')->nullable()->after('manufacturer');
        }
    });
}


    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn([
                'dosage',
                'expiration_date',
                'form',
                'stock_quantity',
                'price',
                'manufacturer',
                'instructions',
            ]);
        });
    }
}
