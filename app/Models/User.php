<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int                    $id
 * @property string                 $name
 * @property string                 $email
 * @property Carbon                 $email_verified_at
 * @property string                 $password
 * @property string                 $api_token
 * @property string                 $remember_token
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 * @property ActionLog[]|Collection $actionsLogs
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Все действия пользователя совершенные через API.
     *
     * @return HasMany|Builder
     */
    public function actionsLogs()
    {
        return $this->hasMany(ActionLog::class, 'user_id', 'id');
    }
}
