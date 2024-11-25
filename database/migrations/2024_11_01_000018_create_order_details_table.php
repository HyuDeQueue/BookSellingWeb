<?php

use App\Models\Book;
use App\Models\Order;
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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
        
            // Khai báo cột khóa ngoại
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('book_id')->nullable();
        
            $table->integer('quantity')->default(0);
            $table->integer('price')->default(0);
            $table->timestamps();
        
            // Thiết lập khóa ngoại
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
        
            $table->foreign('book_id')
                  ->references('id')
                  ->on('books')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

