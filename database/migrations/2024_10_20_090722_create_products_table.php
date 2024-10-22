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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');  // Consider making this a foreign key if it references another table
            $table->string('title');
            $table->decimal('price', 8, 2);  // Use decimal for precise price handling
            $table->integer('discount');
            $table->decimal('quantity', 8, 2);  // Also use decimal for quantity if it can be fractional
            $table->json('featured');
            $table->text('description');
            $table->unsignedInteger('view_count')->nullable();  // Using integer for counts is generally better
            $table->unsignedInteger('add_cart_count')->nullable();
            $table->unsignedInteger('wish_count')->nullable();
            $table->enum('status', ['pending', 'published'])->default('pending');
            $table->string('front_img', 255);  // Specify string length or use text for long paths
            $table->string('back_img', 255);
            $table->string('left_image', 255);
            $table->string('right_img', 255);  // Fixed typo from 'right_imge' to 'right_img'
        
            $table->timestamps();
        
            // Foreign key constraint (optional, if referencing a 'categories' table)
           // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
