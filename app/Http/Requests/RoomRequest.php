<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class RoomRequest extends FormRequest
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
            'name'=>'required',
            'image'=>'required',File::image(),
            'image_1'=>'required',File::image(),
            'image_2'=>'required',File::image(),
            'image_3'=>'required',File::image(),
            'image_4'=>'required',File::image(),
            'type_id'=>'required',	
            'description'=>'required',
            'price'=>'required',
        ];
    }
}
