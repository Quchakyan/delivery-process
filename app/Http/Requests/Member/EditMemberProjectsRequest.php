<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class EditMemberProjectsRequest extends FormRequest
{
    const USER_ID = 'user_id';
    const PARAMS = 'params';
    const PROJECT_ID = 'params.*.project_id';
    const ROLE_IN_PROJECT = 'params.*.role_in_project';
    const IS_OFFICIAL = 'params.*.is_official';
    const DELETE = 'params.*.delete';
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::USER_ID => [
                'required',
                'integer'
            ],
            self::PARAMS => [
                'required',
                'array'
            ],
            self::PROJECT_ID => [
                'required',
                'integer'
            ],
            self::ROLE_IN_PROJECT => [
                'required',
                'string',
            ],
            self::IS_OFFICIAL => [
                'required',
                'boolean'
            ],
            self::DELETE => [
                'nullable',
                'boolean'
            ]
        ];
    }

    public function getUserId(): int
    {
        return $this->get(self::USER_ID);
    }

    public function getParams(): array
    {
        return $this->get(self::PARAMS);
    }
}
