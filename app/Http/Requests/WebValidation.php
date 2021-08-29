<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;



class WebValidation extends FormRequest
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
            "name" => "required|min:3|max:100",
            "description" => "required",

        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Please write a name",
            "name.min" => "The name has to have at least :min characters.",
            "name.max" => "The name has to have no more than :max characters.",
            "description.required" => "Please enter Description",

        ];
    }

   protected function failedValidation(Validator $validator)
   {

       throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
