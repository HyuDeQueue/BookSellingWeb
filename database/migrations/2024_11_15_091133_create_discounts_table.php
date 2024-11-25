<?php

use App\Models\Employee;
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
        Schema::create('discounts', function(Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('type', ['Website', 'Cửa hàng']);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('value');
            $table->integer('starting_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};