<?php

namespace App\Http\Requests;

// use App\Rules\CorrectWords;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['string', 'min:10', 'max:100'],
            'description' => ['string', 'max:300'],
            'category_id' => ['integer', 'exists:categories,id'],
            'rating' => ['integer', 'min:1', 'max:5'],
        ];
    }
}
