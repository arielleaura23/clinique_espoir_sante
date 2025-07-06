// Dans database/migrations/YYYY_MM_DD_HHMMSS_create_appointments_table.php

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
    $table->string('AppointmentNumber')->unique();
    $table->string('Name');
    $table->string('MobileNumber');
    $table->string('Email');
    $table->date('AppointmentDate');
    $table->time('AppointmentTime');
    $table->string('Specialization');

    $table->unsignedBigInteger('doctorId')->nullable();
    $table->unsignedBigInteger('userId')->nullable();

    $table->string('doctorSpecialization')->nullable();
    $table->float('consultancyFees')->nullable();

    $table->text('Message')->nullable();
    $table->date('ApplyDate');

    $table->text('Remark')->nullable();
    $table->string('Status')->default('');

    $table->tinyInteger('userStatus')->default(1);
    $table->tinyInteger('doctorStatus')->default(1);
    $table->timestamp('postingDate')->nullable();
    $table->timestamp('updationDate')->nullable(); 

    $table->timestamps();

    $table->foreign('doctorId')->references('id')->on('medecins')->onDelete('set null');
    $table->foreign('userId')->references('id')->on('users')->onDelete('set null');
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
