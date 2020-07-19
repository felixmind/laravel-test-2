<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;
use Spatie\ResourceLinks\HasMeta;

/**
 * @mixin \App\Models\Client
 */
class ClientResource extends JsonResource
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
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
            ],
            'relationships' => [
                'emails' => ClientEmailResource::collection($this->whenLoaded('emails')),
                'phones' => ClientPhoneResource::collection($this->whenLoaded('phones')),
            ],
            'links' => $this->links(ClientController::class),
        ];
    }

    public static function meta(): array
    {
        return [
            'links' => self::collectionLinks(ClientController::class),
        ];
    }
}
