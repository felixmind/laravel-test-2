<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ClientPhone|Collection $phones
 * @property ClientEmail|Collection $emails
 */
class Client extends Model
{
    protected $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
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
}
