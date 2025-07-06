<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_queries', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('contactno');
            $table->text('message');
            $table->timestamp('PostingDate')->nullable();
            $table->text('AdminRemark')->nullable();
            $table->timestamp('LastupdationDate')->nullable();
            $table->boolean('IsRead')->nullable()->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_queries');
    }
}