<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientPhoneController;
use App\Models\ClientPhone;
use Spatie\ResourceLinks\LinkResource;

/**
 * @mixin ClientPhone
 */
class ClientPhoneResource extends JsonApiResource
{
    protected function getAttributes(): array
    {
        return [
            'phone' => $this->phone,
        ];
    }

    protected function getLinks(): LinkResource
    {
        return $this->links(ClientPhoneController::class, ['client' => $this->client_id]);
    }

    protected static function getMetaLinks(): LinkResource
    {
        return self::collectionLinks(ClientPhoneController::class);
    }
}
