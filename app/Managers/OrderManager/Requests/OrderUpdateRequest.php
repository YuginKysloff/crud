<?php

    namespace App\Managers\OrderManager\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class OrderUpdateRequest extends FormRequest {
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
                'client_id' => 'required|exists:clients,id',
                'product_id' => 'required|exists:products,id',
                'total'  => 'required|integer|min:0|',
                'date'  => 'required|date',
            ];
        }
    }
