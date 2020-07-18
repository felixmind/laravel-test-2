<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $client_id
 * @property Client $client
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ClientEmail extends Model
{
    protected $table = 'client_emails';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo|Builder
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}