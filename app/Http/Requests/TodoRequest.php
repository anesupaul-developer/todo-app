<?php

namespace App\Http\Requests;

use App\Helpers\DateTimeUtil;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->has('due_date') && empty($this->input('due_date')) === false) {
            $this->merge(['due_date' => DateTimeUtil::toDateTimeString($this->input('due_date'))]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required',
            'due_date' => 'required|date|after:now'
        ];
    }
}
