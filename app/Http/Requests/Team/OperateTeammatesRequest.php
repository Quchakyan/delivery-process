<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class OperateTeammatesRequest extends FormRequest
{
    const TEAM_ID = 'team_id';
    const TEAMMATE_IDS = 'teammate_ids';
    public function authorize(): bool
    {
        return true;
    }

    public function getTeamId(): int
    {
        return $this->get(self::TEAM_ID);
    }

    public function getTeammateIds(): array
    {
        return $this->get(self::TEAMMATE_IDS);
    }
}
