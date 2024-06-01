<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'NamaSales' => ['required', 'unique:sales', 'max:100'],
            'Aktif' => ['required'],
            'Tanggal_Lahir' => ['required', 'date', 'min:1'],
            'Paraf' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
