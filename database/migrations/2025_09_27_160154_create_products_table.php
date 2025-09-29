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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->string('short_description', 300)->nullable();
            $table->longText('description')->nullable();
            $table->decimal('neet_price', 10, 2)->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('discount_save', 10, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->string('seo_title', 100)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->string('seo_thumbnail')->nullable();
            $table->string('seo_tags')->nullable();

            $table->boolean('display_at_home')->default(false);
            $table->boolean('is_gallery')->default(false);
            $table->boolean('recommended')->default(false);

            $table->boolean('cod')->default(false);
            $table->boolean('courier')->default(false);
            $table->boolean('hand')->default(false);

            $table->boolean('accept_cupon')->default(false);
            $table->string('badge', 50)->nullable();
            $table->string('tags', 255)->nullable();

            $table->integer('click')->nullable();

            $table->text('shipping_note')->nullable();

            $table->engine('InnoDB');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
