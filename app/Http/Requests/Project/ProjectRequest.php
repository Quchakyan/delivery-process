<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    const NAME = 'name';
    const OWNER_ID = 'owner_id';
    const RATE = 'rate';
    const CURRENCY_ID = 'currency_id';
    const BID = 'bid';

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
                'required'
            ],
            self::RATE => [
                'required',
                'numeric'
            ],
            self::CURRENCY_ID => [
                'required'
            ],
            self::BID => [
                'required',
                'integer'
            ]
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getOwnerId(): int
    {
        return $this->get(self::OWNER_ID);
    }

    public function getRate(): float
    {
        return $this->get(self::RATE);
    }

    public function getCurrencyId(): int
    {
        return $this->get(self::CURRENCY_ID);
    }

    public function getBid()
    {
        return $this->get(self::BID);
    }
}
