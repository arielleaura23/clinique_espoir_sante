<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PatientID');
            $table->string('BloodPressure');
            $table->string('BloodSugar');
            $table->string('Weight');
            $table->string('Temperature');
            $table->text('MedicalPres');
            $table->timestamp('CreationDate')->nullable();
            $table->foreign('PatientID')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
}
