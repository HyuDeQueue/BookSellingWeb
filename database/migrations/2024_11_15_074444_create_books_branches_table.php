<?php

use App\Models\Book;
use App\Models\Branch;
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
        Schema::create('books_branches', function(Blueprint $table) {
            $table->id();
            //Khoá ngoại Book
            $table->foreignIdFor(Book::class);
            //Khoá ngoại Branch
            $table->foreignIdFor(Branch::class);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_branches');
    }
};
