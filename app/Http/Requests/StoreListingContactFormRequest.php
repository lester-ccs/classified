<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingContactFormRequest extends FormRequest
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
            'message' => 'required|min:2|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'You need to enter a message',
            'message.min:2' => 'Please expound.',
            'message.max:1000' => 'Please be brief. Less than 1,000 characters please.'
        ];
    }
}
