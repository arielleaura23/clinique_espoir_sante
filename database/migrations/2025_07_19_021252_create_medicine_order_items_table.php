<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// migration create_medicine_order_items_table.php
public function up(): void
{
    Schema::create('medicine_order_items', function (Blueprint $table) {
        $table->id();


        $table->unsignedBigInteger('medicine_order_id');
        $table->foreign('medicine_order_id')->references('id')->on('medicine_orders')->onDelete('cascade');

        $table->unsignedBigInteger('medicine_id');
        $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');

        $table->integer('quantity')->default(1);
        $table->decimal('price', 10, 2); 

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_order_items');
    }
};
