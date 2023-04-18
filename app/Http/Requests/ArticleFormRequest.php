<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ArticleFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"                => ["string", "required"],
            "description"         => ["string", "nullable"],
            "unit_purchase_price" => ["numeric", "required"],
            "unit_selling_price"  => ["numeric", "required"],
            "stock"               => ["numeric", "required"],
            "minimum_stock"       => ["numeric", "required"],
        ];
    }

    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         "slug" => Str::slug($this->name),
    //     ]);
    // }
}
