<?php

    namespace App\Managers\OrderManager\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    class OrderIndexRequest extends FormRequest {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize() {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules() {
            return [
                'search[keyword]' => 'alpha_dash|max:255',
                'search[field]'   => [
                    'required',
                    Rule::in(['all', 'client', 'product', 'total', 'date']),
                ],
            ];
        }
    }
