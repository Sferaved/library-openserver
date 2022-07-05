<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' =>  'required',
            'category_id' =>  'required',
            'author_id' =>  'required',
            'description' =>  'required',
            'description' =>  'required',
     /*       'cover' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|
                dimensions:min_width=10,min_height=10,max_width=2000,max_height=2000'*/
        ];
    }
}
