<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id;
 * @property string $name;
 * @property int $owner_id;
 * @property int $rate;
 * @property int $currency_id;
 */
class Project extends Model
{
    use HasFactory;

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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
