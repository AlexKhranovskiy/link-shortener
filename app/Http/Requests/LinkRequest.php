<?php

namespace App\Http\Requests;

use App\Exceptions\BadRequestException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class LinkRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if ($this->route('shortLink') != 'links') {
            $this->merge(['shortLink' => $this->route('shortLink')]);
        }
    }

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shortLink' => 'required'
        ];
    }

    /**
     * @throws BadRequestException
     */
    public function failedValidation(Validator $validator)
    {
        throw new BadRequestException(data: $validator->errors()->all());
    }
}
