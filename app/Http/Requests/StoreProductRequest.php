<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            
            //  
            // 'items.*.size' => 'required|string',
            // 'items.*.id' => 'required|integer',
            // 'items.*.color' => 'required|string',
            // 'items.*.status' => 'required|integer',
            // 'items.*.sku' => 'required|string|unique:items,sku|max:50',
            // 'items.*.price' => 'required|numeric',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ];
    }
}
