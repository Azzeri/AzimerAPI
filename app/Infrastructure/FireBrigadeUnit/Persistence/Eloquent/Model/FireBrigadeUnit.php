<?php

declare(strict_types=1);

namespace App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Model;

use Database\Factories\FireBrigadeUnit\FireBrigadeUnitFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class representing fire brigade unit's Eloquent model
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnit extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return FireBrigadeUnitFactory::new();
    }

    protected $fillable = [
        'name',
        'superior_fire_brigade_unit_id',
    ];

    /**
     * Return superior fire brigade unit
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function superiorFireBrigadeUnit(): BelongsTo
    {
        return $this->belongsTo(
            FireBrigadeUnit::class,
            'superior_fire_brigade_unit_id',
            'id'
        );
    }
}
