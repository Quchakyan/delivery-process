<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    const NAME = 'name';
    const OWNER_ID = 'owner_id';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string'
            ],
            self::OWNER_ID => [
                'required',
                'integer'
            ]
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getOwnerID(): int
    {
        return $this->get(self::OWNER_ID);
    }
}
