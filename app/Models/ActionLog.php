<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Запись о действии совершенном пользователем через API.
 *
 * @property int    $id
 * @property int    $user_id
 * @property User   $user
 * @property string $method
 * @property string $url
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ActionLog extends Model
{
    protected $table = 'api_actions_log';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'method',
        'url',
        'content',
    ];

    /**
     * @return BelongsTo|Builder
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
