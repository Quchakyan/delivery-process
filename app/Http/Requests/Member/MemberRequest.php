<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    const NAME = 'name';
    const LASTNAME = 'lastname';
    const ROLE_ID = 'role_id';
    const POSITION_ID = 'position_id';
    const MENTOR_ID = 'mentor_id';
    const MANUAL_BUSYNESS = 'manual_busyness';
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
            self::LASTNAME => [
                'required',
                'string'
            ],
            self::ROLE_ID => [
                'required',
                'integer'
            ],
            self::POSITION_ID => [
                'required',
                'integer'
            ],
            self::MENTOR_ID => 'nullable | integer',
            self::MANUAL_BUSYNESS => 'nullable | integer'
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getLastname(): string
    {
        return $this->get(self::LASTNAME);
    }

    public function getRoleId(): int
    {
        return $this->get(self::ROLE_ID);
    }

    public function getPositionId(): int
    {
        return $this->get(self::POSITION_ID);
    }

    public function getMentorId(): int|null
    {
        return $this->get(self::MENTOR_ID);
    }

    public function getManualBusyness(): int|null
    {
        return $this->get(self::MANUAL_BUSYNESS);
    }
}
