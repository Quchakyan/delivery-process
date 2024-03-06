<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Team\Dto\TeamDto;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name;
 * @property int $owner_id;
 */

class Team extends Model
{
    use HasFactory;

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setOwnerId(int $ownerId): self
    {
        $this->owner_id = $ownerId;

        return $this;
    }

    public function teammates(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_members', 'team_id', 'member_id');
    }
}
