<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientPhoneController;
use App\Models\ClientPhone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;
use Spatie\ResourceLinks\HasMeta;

/**
 * @mixin ClientPhone
 */
class ClientPhoneResource extends JsonResource
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
                'phone' => $this->phone,
            ],
            'links' => $this->links(ClientPhoneController::class, ['client' => $this->client_id]),
        ];
    }

    public static function meta(): array
    {
        return [
            'links' => self::collectionLinks(ClientPhoneController::class),
        ];
    }
}
