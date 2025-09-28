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
        Schema::create('products_has_images', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_gallery')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_has_images');
    }
};
