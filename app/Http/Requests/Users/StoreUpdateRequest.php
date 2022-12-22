<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'lastname'  => 'required',
            'firstname' => 'required',
            'avatar_id' => 'nullable|exists:files,id',
            'sites'     => 'nullable|exists:sites,id'
        ];

        if ($this->type === 'customer')
        {
            $rules['sites'] = 'required|exists:sites,id';
        }

        return $rules;
    }
}
