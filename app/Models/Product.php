<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const MILLIGRAM = 'mg';
    const GRAM = 'g';
    const KILOGRAM = 'kg';
    const UNIT = 'pcs';
    const BOX = 'box';

    public static function availableUnits(): array
    {
        return [
            self::MILLIGRAM,
            self::GRAM,
            self::KILOGRAM,
            self::UNIT,
            self::BOX,
        ];
    }

    protected $fillable = [
        'code', 'name', 'unit',
        'initial_stock', 'current_stock',
    ];

    public function scopeSearch(Builder $query, ?string $search)
    {
        return $query->when($search, function (Builder $query) use ($search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('code', $search);
        });
    }

    public function scopeRender(Builder $query, ?int $page)
    {
        return $query->paginate($page ?? 25)->withQueryString();
    }
}
