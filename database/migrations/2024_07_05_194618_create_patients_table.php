<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Docid');
            $table->string('PatientName');
            $table->string('PatientContno');
            $table->string('PatientEmail');
            $table->string('PatientGender');
            $table->string('PatientAdd');
            $table->integer('PatientAge');
            $table->text('PatientMedhis')->nullable();
            $table->timestamp('CreationDate')->nullable();
            $table->timestamp('UpdationDate')->nullable();
            $table->timestamps();

            $table->foreign('Docid')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
