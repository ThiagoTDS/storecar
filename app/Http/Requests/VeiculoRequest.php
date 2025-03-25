<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'         =>'required|string',
            'brand'        =>'required|string',
            'veiculo_ano'  =>'required|integer',
            'kilometers'   =>'required|integer',
            'city'         =>'required|string',
            'type'         =>'required|string',
            'price'        =>'required|integer',
            'description'  =>'nullable',
            'image'        => 'nullable',
            'contact_name' => 'required|string|min:3',
            'contact_phone'=> 'required|string',
            'contact_mail' => 'required|email',
            
        ];
    }
    
    public function messages(): array
    {
        return[
            'name.required' => 'Nome do veículo é obrigatório',
            'brand.required' => 'Marca do veículo é obrigatória',
            
            'veiculo_ano.required' => 'Ano do veículo obrigatório',
            'veiculo_ano.integer' => 'Ano do veículo deve ser numérico',

            'kilometers.required' => 'Kilometragem do veículo obrigatória',
            'kilometers.integer' => 'Kilometragem do veículo deve ser numérico',

            'city.required' => 'Cidade do veículo é obrigatória',
            'type.required' => 'Tipo do veículo é obrigatório',

            'price.required' => 'Preço do veículo obrigatório',
            'price.integer' => 'Preço do veículo deve ser numérico',

            'image'=> 'nullable',
            
            'description'=>'nullable',

            'contact_name.required' =>'Nome do vendedor obrigatório',
            'contact_name.string' =>'Campo tipo texto',
            'contact_name.min'=>'Campo deve ter no mínimo 3 caracteres',

            'contact_phone.required' =>'Telefone do vendedor obrigatório',
            
            'contact_mail.required' =>'Email do vendedor obrigatório',
            'contact_mail.email' => 'Precisa ser um email válido',
        ];
    }
}