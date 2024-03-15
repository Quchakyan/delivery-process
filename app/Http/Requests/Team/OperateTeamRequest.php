<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class OperateTeamRequest extends TeamRequest
{
    const TEAM_ID = 'team_id';
    const TEAMMATE_IDS = 'teammate_ids';

    public function rules(): array
    {
        return [
            self::TEAM_ID => [
                'required',
                'integer'
            ],
            self::TEAMMATE_IDS => [
                'array'
            ]
        ];
    }

    public function getTeamId(): int
    {
        return $this->get(self::TEAM_ID);
    }

    public function getTeammateIds(): array|null
    {
        return $this->get(self::TEAMMATE_IDS);
    }
}
