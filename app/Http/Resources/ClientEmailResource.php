<?php

namespace App\Http\Resources;

use App\Http\Controllers\ClientEmailController;
use App\Models\ClientEmail;
use Spatie\ResourceLinks\LinkResource;

/**
 * @mixin ClientEmail
 */
class ClientEmailResource extends JsonApiResource
{
    protected function getAttributes(): array
    {
        return [
            'email' => $this->email,
        ];
    }

    protected function getLinks(): LinkResource
    {
        return $this->links(ClientEmailController::class, ['client' => $this->client_id]);
    }

    protected static function getMetaLinks(): LinkResource
    {
        return self::collectionLinks(ClientEmailController::class);
    }
}
