<?php

namespace App\Models;

use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\UpdateMemberDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public static function staticCreate(MemberDto $dto): self {
        $member = new self();

        $member->setRoleId($dto->roleId);
        $member->setPositionId($dto->positionId);
        $member->setName($dto->name);
        $member->setLastname($dto->lastname);
        $member->setMentorId($dto->mentorId);
        $member->setManualBusyness($dto->manualBusyness);

        $member->save();

        return $member;
    }

    public function updateSelf(UpdateMemberDto $dto): self
    {
        $this->setRoleId($dto->roleId);
        $this->setPositionId($dto->positionId);
        $this->setName($dto->name);
        $this->setLastname($dto->lastname);
        $this->setMentorId($dto->mentorId);
        $this->setManualBusyness($dto->manualBusyness);

        return $this;
    }

    public function setRoleId(int $roleId): void
    {
        $this->role_id = $roleId;
    }

    public function setPositionId(int $positionId): void
    {
        $this->position_id = $positionId;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setMentorId(?int $id): void
    {
        $this->mentor_id = $id;
    }

    public function setManualBusyness(?int $manualBusyness): void
    {
        $this->manual_busyness = $manualBusyness;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function mentor(): HasOne | null
    {
        return $this->hasOne(Member::class, 'mentor_id');
    }

    public function students(): HasMany | null
    {
        return $this->hasMany(Member::class);
    }
}
