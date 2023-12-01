<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        
        if ($this->isMethod('POST')) {
            $rules = [
                'vehiclePlate' => 'required|string|size:7',
                'entryDateTime' => 'required|date',
                'exitDateTime' => 'required|date',
                'priceType' => 'required|string',
                'price' => 'required|numeric',
                'userId' => 'required|exists:users,id',
            ];
        }

        if ($this->isMethod('PUT')) {
            $rules = [
                'vehiclePlate' => 'string|size:7',
                'price' => 'numeric',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'vehiclePlate.required' => 'O campo placa do veículo é obrigatório.',
            'vehiclePlate.size' => 'O campo placa do veículo deve ter exatamente 7 caracteres.',
            'entryDateTime.required' => 'O campo data de entrada é obrigatório.',
            'entryDateTime.date_format' => 'O campo data de entrada deve estar no formato de data e hora válido.',
            'exitDateTime.required' => 'O campo data de saída é obrigatório.',
            'exitDateTime.date_format' => 'O campo data de saída deve estar no formato de data e hora válido.',
            'priceType.required' => 'O campo tipo de preço é obrigatório.',
            'price.numeric' => 'O campo preço deve ser um número.',
            'price.required' => 'O campo preço é obrigatório.',
            'userId.required' => 'O campo ID do usuário é obrigatório.',
            'userId.exists' => 'O usuário fornecido não existe.',
            'string' => 'O campo :attribute deve ser uma string.',
            'date' => 'O campo :attribute deve ser uma data válida.',
            'numeric' => 'O campo :attribute deve ser um número.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json(['errors' => $errors->all()], 422);
        throw new HttpResponseException($response);
    }
}
