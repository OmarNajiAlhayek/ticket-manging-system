<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'deadline' => ['required', 'date'],//format,, 'after:today'
            'assigned_users' => ['nullable', 'array'],
            'status' => ['required', 'in:pending,ongoing,testing,finished'],
            'attachment_file' => 'nullable|file|max:2048'
        ];
    }
}
