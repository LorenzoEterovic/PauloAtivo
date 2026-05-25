<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'autor' => ['required', 'string', 'max:255'],
            'isbn' => [
                'required',
                'string',
                'max:17',
                'regex:/^(?:\\d{9}[\\dXx]|\\d{13})$/',
                Rule::unique('livros', 'isbn')->ignore($this->route('livro')),
            ],
            'ano_publicacao' => ['required', 'integer', 'min:1500', 'max:2026'],
            'numero_paginas' => ['required', 'integer', 'min:1'],
            'editora' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O campo título deve ser um texto.',
            'titulo.max' => 'O campo título deve ter no máximo :max caracteres.',

            'autor.required' => 'O campo autor é obrigatório.',
            'autor.string' => 'O campo autor deve ser um texto.',
            'autor.max' => 'O campo autor deve ter no máximo :max caracteres.',

            'isbn.required' => 'O campo ISBN é obrigatório.',
            'isbn.string' => 'O campo ISBN deve ser um texto.',
            'isbn.max' => 'O campo ISBN deve ter no máximo :max caracteres.',
            'isbn.regex' => 'O campo ISBN deve conter um formato válido de ISBN-10 ou ISBN-13.',
            'isbn.unique' => 'Esse ISBN já está cadastrado em outro livro.',

            'ano_publicacao.required' => 'O campo ano de publicação é obrigatório.',
            'ano_publicacao.integer' => 'O campo ano de publicação deve ser um número inteiro.',
            'ano_publicacao.min' => 'O campo ano de publicação deve ser igual ou superior a :min.',
            'ano_publicacao.max' => 'O campo ano de publicação deve ser igual ou inferior a :max.',

            'numero_paginas.required' => 'O campo número de páginas é obrigatório.',
            'numero_paginas.integer' => 'O campo número de páginas deve ser um número inteiro.',
            'numero_paginas.min' => 'O campo número de páginas deve ser maior ou igual a :min.',

            'editora.string' => 'O campo editora deve ser um texto.',
            'editora.max' => 'O campo editora deve ter no máximo :max caracteres.',
        ];
    }
}
