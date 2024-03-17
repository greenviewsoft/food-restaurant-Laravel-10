<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'short_description' => 'required|string',
            'button_link' => 'required|url',
            'offer' => 'required',
            'status' => 'required|in:0,1',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072', // Assuming max size is 2MB
        ];
    }
}
