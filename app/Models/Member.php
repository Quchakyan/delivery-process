<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id;
 * @property int $role_id;
 * @property int $position_id;
 * @property string $name;
 * @property string $lastname;
 * @property int|null $mentor_id;
 * @property integer $automatic_busyness;
 * @property integer $manual_busyness;
 */
class Member extends Model
{
    use HasFactory;

    public function setRoleId(int $roleId): self
    {
        $this->role_id = $roleId;

        return $this;
    }

    public function setPositionId(int $positionId): self
    {
        $this->position_id = $positionId;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setMentorId(?int $id): self
    {
        $this->mentor_id = $id;

        return $this;
    }

    public function setManualBusyness(?int $manualBusyness): self
    {
        $this->manual_busyness = $manualBusyness;

        return $this;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function students(): HasMany | null
    {
        return $this->hasMany(Member::class, 'mentor_id');
    }

    public function ownProjects(): HasMany | null
    {
        return $this->hasMany(Project::class, 'owner_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'member_projects', 'member_id');
    }

    public function projectStats(): HasMany
    {
        return $this->hasMany(MemberProject::class, 'member_id');
    }
}
