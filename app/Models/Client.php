<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @property int                    $id
 * @property string                 $first_name
 * @property string                 $last_name
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 * @property ClientPhone|Collection $phones
 * @property ClientEmail|Collection $emails
 *
 * @method Builder filters(array $filters)
 */
class Client extends Model
{
    protected $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    /**
     * Телефоны клиента.
     *
     * @return HasMany|Builder
     */
    public function phones()
    {
        return $this->hasMany(ClientPhone::class, 'client_id', 'id');
    }

    /**
     * Электронные адреса клиента.
     *
     * @return HasMany|Builder
     */
    public function emails()
    {
        return $this->hasMany(ClientEmail::class, 'client_id', 'id');
    }

    /**
     * Скоуп по фильтрам.
     *
     * @param Builder $query
     * @param array   $filters
     *
     * @return Builder|QueryBuilder
     */
    public function scopeFilters($query, array $filters)
    {
        if (isset($filters['email'])) {
            $query->whereHas('emails', function (Builder $query) use ($filters) {
                $query->where('email', 'LIKE', "%{$filters['email']}%");
            });
        }

        if (isset($filters['phone'])) {
            $query->whereHas('phones', function (Builder $query) use ($filters) {
                $query->where('phone', 'LIKE', "%{$filters['phone']}%");
            });
        }

        if (isset($filters['name'])) {
            $words = explode(' ', $filters['name']);
            $first = trim($words[0]);
            $second = $words[1] ?? null;
            if (isset($first, $second)) {
                $second = trim($second);

                $query->where(function (Builder $query) use ($first, $second) {
                    $query->where(function (Builder $query) use ($first, $second) {
                        $query->where('first_name', $first)
                              ->where('last_name', $second);
                    })->orWhere(function (Builder $query) use ($first, $second) {
                        $query->where('first_name', $second)
                              ->where('last_name', $first);
                    });
                });
            } else {
                $query->where(function (Builder $query) use ($first) {
                    $query->where('first_name', 'LIKE', "%{$first}%")
                          ->orWhere('last_name', 'LIKE', "%{$first}%");
                });
            }
        }

        return $query;
    }
}
