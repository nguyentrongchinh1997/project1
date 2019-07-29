<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
=======
use App\Model\Category;
>>>>>>> 1cd77f90c86cc7063d3c6dd63b6aa3907d0aad3e

class CategoryRequest extends FormRequest
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
            "name" => "required|unique:categories,name",
        ];
    }
}
