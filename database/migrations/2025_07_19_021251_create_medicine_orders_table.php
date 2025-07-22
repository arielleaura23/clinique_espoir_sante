<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// migration create_medicine_orders_table.php
public function up(): void
{
    Schema::create('medicine_orders', function (Blueprint $table) {
        $table->id();


        $table->unsignedBigInteger('user_id'); 
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        $table->decimal('total_price', 10, 2);
        $table->string('status')->default('pending');
        
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_orders');
    }
};
