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
            $table->integer('user_id');
            $table->integer('category_id');  // Consider making this a foreign key if it references another table
            $table->integer('sub_category_id');
            $table->string('title');
            $table->string('brand');
            $table->decimal('price', 8, 2);  // Use decimal for precise price handling
            $table->integer('discount');
            $table->decimal('quantity', 8, 2);  // Also use decimal for quantity if it can be fractional
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('material')->nullable();
            $table->json('featured');
            $table->text('description');
            $table->unsignedInteger('view_count')->nullable();  // Using integer for counts is generally better
            $table->unsignedInteger('add_cart_count')->nullable();
            $table->unsignedInteger('wish_count')->nullable();
            $table->enum('status', ['pending', 'published'])->default('published');
            $table->string('front_img', 255)->nullable();  // Specify string length or use text for long paths
            $table->string('back_img', 255)->nullable();
            $table->string('left_image', 255)->nullable();
            $table->string('right_img', 255)->nullable();  // Fixed typo from 'right_imge' to 'right_img'

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
