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
Schema::create('appointments', function (Blueprint $table) {
    $table->id();
    $table->string('appointment_number')->unique();
    $table->string('name');
    $table->string('mobile_number');
    $table->string('email');
    $table->date('appointment_date');
    $table->time('appointment_time');
    $table->string('specialization');

    $table->unsignedBigInteger('doctor_id')->nullable();
    $table->unsignedBigInteger('user_id')->nullable();

    $table->string('doctor_specialization')->nullable();
    $table->float('consultancy_fees')->nullable();

    $table->text('message')->nullable();
    $table->date('apply_date');

    $table->text('remark')->nullable();
    $table->string('status')->default('En attente');

    $table->tinyInteger('user_status')->default(1);
    $table->tinyInteger('doctor_status')->default(1);
    $table->timestamp('posting_date')->nullable();
    $table->timestamp('updation_date')->nullable();

    $table->timestamps();

    $table->foreign('doctor_id')->references('id')->on('medecins')->onDelete('set null');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
