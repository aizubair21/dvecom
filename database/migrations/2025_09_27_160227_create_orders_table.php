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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // identity 
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('thana', 100)->nullable();
            $table->string('village', 100)->nullable();
            $table->string('zip', 100)->nullable();
            $table->text('address', 255)->nullable();

            $table->text('user_id', 10)->nullable();
            $table->string('shpping', 100)->nullable()->default(120);
            $table->string('payment_method', 100)->nullable()->default('cod');
            $table->string('area_condition', 100)->nullable()->default('Dhaka');

            // price and total
            $table->text('total', 100)->nullable();

            // accept cupon
            $table->boolean('cupon')->default(false);

            // status
            $table->string('status', 100)->nullable()->default('Pending');

            // boolean 
            $table->boolean('auth')->default(false);

            // soft delete
            $table->softDeletes();
            $table->engine('InnoDB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
