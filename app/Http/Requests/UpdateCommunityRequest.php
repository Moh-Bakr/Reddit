<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCommunityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                Rule::unique('communities')->ignore($this->community)
            ],
            'description' => 'required|max:500',
        ];
    }
}
