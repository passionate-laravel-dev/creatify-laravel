<?php

namespace Passionatelaraveldev\CreatifyLaravel\Requests\Webhook;

use Illuminate\Foundation\Http\FormRequest;

class CreateLipsyncRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'status' => 'string',
            'failed_reason' => 'string',
            'output' => 'string',
        ];
    }
}
