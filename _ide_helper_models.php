<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int                    $id
 * @property string                 $first_name
 * @property string                 $last_name
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 * @property ClientPhone|Collection $phones
 * @property ClientEmail|Collection $emails
 * @property-read int|null $emails_count
 * @property-read int|null $phones_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ActionLog
 *
 * @property int    $id
 * @property int    $user_id
 * @property User   $user
 * @property string $method
 * @property string $url
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ActionLog whereUserId($value)
 */
	class ActionLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientEmail
 *
 * @property int $id
 * @property int $client_id
 * @property Client $client
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientEmail whereUpdatedAt($value)
 */
	class ClientEmail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActionLog[] $actionsLogs
 * @property-read int|null $actions_logs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientPhone
 *
 * @property int $id
 * @property int $client_id
 * @property Client $client
 * @property string $phone
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientPhone whereUpdatedAt($value)
 */
	class ClientPhone extends \Eloquent {}
}

