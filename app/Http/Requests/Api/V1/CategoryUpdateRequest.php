<?php

namespace App\Http\Requests\Api\V1;

// since we need the same validation rules as in CategoryStoreRequest, we can extend this 
class CategoryUpdateRequest extends CategoryStoreRequest
{
    //
}

// class CategoryUpdateRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return false;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//      */
//     public function rules(): array
//     {
//         return [
//             //
//         ];
//     }
// }
