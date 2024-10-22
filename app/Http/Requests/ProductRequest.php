<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required|integer|exists:categories,id'],  // Ensure category exists
            'title' => ['required|string|max:255'],
            'price' => ['required|numeric|min:0'],  // Ensure the price is numeric and non-negative
            'discount' => ['required|integer|min:0|max:100'],  // Discount should be between 0 and 100%
            'quantity' => ['required|numeric|min:0'],  // Ensure the quantity is numeric and non-negative
            'featured' => ['nullable|json'],  // JSON format validation
            'description' => ['nullable|string'],
            'view_count' => ['nullable|integer|min:0'],  // Non-negative integer
            'add_cart_count' => ['nullable|integer|min:0'],
            'wish_count' => ['nullable|integer|min:0'],
            'status' => ['required|in:pending,published'],  // Only 'pending' or 'published' allowed
            'front_img' => ['required|string|max:255'],  // Ensure it's a valid image path
            'back_img' => ['nullable|string|max:255'],   // Same for the rest of the image fields
            'left_image' => ['nullable|string|max:255'],
            'right_img' => ['nullable|string|max:255'],
        ];
    }
}
