<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use Spatie\ResourceLinks\LinkResource;

/**
 * @mixin Client
 */
class ClientResource extends JsonApiResource
{
    protected function getAttributes(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
        ];
    }

    protected function getRelationships(): array
    {
        return [
            'emails' => ClientEmailResource::collection($this->whenLoaded('emails')),
            'phones' => ClientPhoneResource::collection($this->whenLoaded('phones')),
        ];
    }

    protected function getLinks(): LinkResource
    {
        return $this->links(ClientController::class);
    }

    protected static function getMetaLinks(): LinkResource
    {
        return self::collectionLinks(ClientController::class);
    }
}
