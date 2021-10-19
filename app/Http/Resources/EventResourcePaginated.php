<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResourcePaginated extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "meta" => [
                "curentPage" => $this["curentPage"],
                "totalPages" => $this["totalPages"],
                "totalEvents" => $this["totalEvents"],
            ],
            "data" => EventResource::collection($this["events"]),
        ];
    }
}
