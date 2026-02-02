<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        // Connects to the orders table. If order is deleted, items are deleted too.
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        
        // Connects to the books table
$table->foreignId('book_id')->constrained()->onDelete('cascade');         
        $table->integer('quantity');
        $table->decimal('price', 8, 2); // Stores the price at the time of purchase
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
