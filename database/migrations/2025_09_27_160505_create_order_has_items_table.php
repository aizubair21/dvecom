<?php

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
        Schema::defaultStringLength(191);
        Schema::create('order_has_items', function (Blueprint $table) {
            $table->id();

            $table->string('order_id', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('qty', 100)->nullable();
            $table->string('price', 100)->nullable();
            $table->string('neet_price', 100)->nullable();
            $table->string('total', 100)->nullable();
            $table->string('attr', 100)->nullable();
            $table->string('unit_type', 100)->nullable();
            $table->string('unit_note', 100)->nullable();
            $table->string('discount', 100)->nullable();

            $table->string('status')->default('Pending');

            $table->boolean('cupon')->default(false);

            $table->engine('InnoDB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_has_items');
    }
};
