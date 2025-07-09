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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Champs généraux
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Champs communs ou optionnels
            $table->string('sexe')->nullable();
            $table->string('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();

            // Champs spécifiques aux rôles
            $table->string('specialization')->nullable();
            $table->float('consultancy_fees')->nullable();
            $table->text('medical_history')->nullable();

            $table->unsignedBigInteger('doctor_id')->nullable(); // le médecin du patient (si rôle = patient)
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('set null');

            $table->string('role')->default('patient');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
