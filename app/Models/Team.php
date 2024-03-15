<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function teammates(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_members', 'team_id', 'member_id');
    }
}
