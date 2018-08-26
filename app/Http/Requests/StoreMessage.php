<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Validators\GoogleRecaptchaValidator;

class StoreMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorizes the request if the submitted data is JSON encoded.
        return $this->isJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|string|max:70'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator) {
        // Validates the reCAPTCHA if it exists in the supplied Request.
        $recaptchaValid = GoogleRecaptchaValidator::validate($this->all());
        if (!isset($recaptchaValid) || !$recaptchaValid["success"]) {
          $validator->errors()->add('reCAPTCHA', 'Google reCAPTCHA has failed.');
        }
    }
}
