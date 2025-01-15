<?php

namespace Modules\SkyTours\Models\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class LegsCollection
 * @package Modules\SkyTours\Models\Transformers
 */
class LegsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'author' => [
                'idea' => 'CoMMArka Studios',
                'email' => 'contacto@commarka.app',
                'dev' => 'Julian A. Ramirez'
            ]
        ];
    }
}
