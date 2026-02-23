<?php
// app/Http/Requests/BookingRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
            'hours' => 'required|in:1,2,3,4',
            'skate_id' => 'nullable|exists:skates,id',
            'skate_size' => 'required_with:skate_id|string|max:10'
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Введите корректный номер телефона в формате +7 (XXX) XXX-XX-XX',
            'hours.in' => 'Выберите количество часов от 1 до 4',
            'skate_size.required_with' => 'Выберите размер коньков'
        ];
    }
}