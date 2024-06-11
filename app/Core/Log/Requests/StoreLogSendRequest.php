<?php

namespace App\Core\Log\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogSendRequest extends FormRequest
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
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'client' => 'required',
            'message' => 'required',
            'level' => 'required',
            'user_id' => 'required|integer',
        ];
    }
}
