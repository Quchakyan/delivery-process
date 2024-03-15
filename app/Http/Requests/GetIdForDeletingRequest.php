<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetIdForDeletingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getId(): int
    {
        return $this->route('id');
    }
}
