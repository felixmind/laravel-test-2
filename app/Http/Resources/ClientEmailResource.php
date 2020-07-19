<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientEmailController;
use App\Models\ClientEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;
use Spatie\ResourceLinks\HasMeta;

/**
 * @mixin ClientEmail
 */
class ClientEmailResource extends JsonResource
{
    use HasLinks;
    use HasMeta;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'attributes' => [
                'email' => $this->email,
            ],
            'links' => $this->links(ClientEmailController::class, ['client' => $this->client_id]),
        ];
    }

    public static function meta(): array
    {
        return [
            'links' => self::collectionLinks(ClientEmailController::class),
        ];
    }
}
