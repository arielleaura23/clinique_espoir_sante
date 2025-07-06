<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorSpecilizationsTable extends Migration
{
    public function up()
    {
        Schema::create('doctor_specilizations', function (Blueprint $table) {
            $table->id();
            $table->string('specilization');
            $table->timestamp('creationDate')->nullable();
            $table->timestamp('updationDate')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctor_specilizations');
    }
}
