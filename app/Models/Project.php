<?php

namespace App\Models;

use App\Services\Project\Dto\ProjectDto;
use App\Services\Project\Dto\ProjectUpdateDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id;
 * @property string $name;
 * @property int $owner_id;
 * @property int $rate;
 * @property int $currency_id;
 * @property $bid;
 */

class Project extends Model
{
    use HasFactory;

    public static function staticCreate(ProjectDto $dto): self
    {
        $project = new self();

        $project->setName($dto->name);
        $project->setOwnerId($dto->ownerId);
        $project->setRate($dto->rate);
        $project->setCurrencyId($dto->currencyId);
        $project->setBid($dto->bid);

        $project->save();

        return $project;
    }

    public function updateSelf(ProjectUpdateDto $dto): self
    {
        $this->name = $dto->name;
        $this->owner_id = $dto->ownerId;
        $this->rate = $dto->rate;
        $this->currency_id = $dto->currencyId;
        $this->bid = $dto->bid;

        $this->save();

        return $this;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->owner_id = $ownerId;
    }

    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }

    public function setCurrencyId(int $currencyId): void
    {
        $this->currency_id = $currencyId;
    }

    public function setBid($bid): void
    {
        $this->bid = $bid;
    }
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
