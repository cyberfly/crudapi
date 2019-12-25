<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "list_name" => $this->list_name,
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "distance" => (float)number_format($this->distance, 3),
            "submitter_id" => $this->submitter_id,
            "created_at" => (string)$this->created_at,
            "updated_at" => (string)$this->updated_at,
        ];
    }
}
