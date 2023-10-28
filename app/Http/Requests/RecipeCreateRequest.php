<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // formのname属性で指定
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'category' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'ingredients.*.name' => 'required|string|max:50',
            'ingredients.*.quantity' => 'required|string|max:50',
            'steps.*' => 'required|string|max:50'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'レシピ名',
            'description' => 'レシピの説明',
            'category' => 'カテゴリー',
            'image' => 'レシピの画像',
            'ingredients.*.name' => '材料名',
            'ingredients.*.quantity' => '分量',
            'steps.*' => '手順'
        ];
    }
}
