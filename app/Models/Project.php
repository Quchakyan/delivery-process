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

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function setCurrencyId(int $currencyId): self
    {
        $this->currency_id = $currencyId;

        return $this;
    }

    public function setBid($bid): self
    {
        $this->bid = $bid;

        return $this;
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
