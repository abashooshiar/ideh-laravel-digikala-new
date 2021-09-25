<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $array = [
            'name' => 'required',
            'pic' => 'image',
        ];
        if (empty($this->request->get('ename'))) {
            $array['search_url'] = 'required';
        }
        return $array;
    }

    public function attributes()
    {
        return [
            'name' => 'Kategoriename',
            'image' => 'Kategorie icon',
        ];
    }
    public function messages()
    {
        return [
            'search_url.required' => 'Entweder Englisch Name oder URL eingegeben werden muss.'
        ];
    }
}
