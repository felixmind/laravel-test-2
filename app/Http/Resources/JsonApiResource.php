<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;
use Spatie\ResourceLinks\HasMeta;
use Spatie\ResourceLinks\LinkResource;

/**
 * Базовый класс ресурса, определяющий общий формат ресурсов и
 * обязательные данные, которые ресурсы должны содержать: атрибуты и ссылки.
 * Дополнительные данные: отношения.
 *
 * @link https://jsonapi.org/format/
 */
abstract class JsonApiResource extends JsonResource
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
        $data = [
            'id' => $this->id,
            'attributes' => $this->getAttributes(),
            'links' => $this->getLinks(),
        ];

        $relationships = $this->getRelationships();
        if (count($relationships)) {
            $data['relationships'] = $relationships;
        }

        return $data;
    }

    public static function meta(): array
    {
        return [
            'links' => static::getMetaLinks(),
        ];
    }

    protected function getRelationships(): array
    {
        return [];
    }

    abstract protected function getAttributes(): array;

    abstract protected function getLinks(): LinkResource;

    abstract protected static function getMetaLinks(): LinkResource;
}
