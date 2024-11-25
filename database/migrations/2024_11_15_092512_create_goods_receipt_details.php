<?php

use App\Models\Book;
use App\Models\GoodsReceipt;
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
        Schema::create('goods_receipt_details', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GoodsReceipt::class);
            $table->foreignIdFor(Book::class);
            $table->integer('quantity');
            $table->integer('price');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_receipt_details');
    }
};
