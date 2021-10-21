<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class EventResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "created_at" => date("d-F-Y h:i:s",strtotime($this->created_at)),
            "category" => $this->whenLoaded("category",new CategoryOneResource($this->category)),
            "tickets" => $this->when($request->keyword,function() {
                return TicketResource::collection($this->whenLoaded("tickets"));
            })
        ];
    }
}
