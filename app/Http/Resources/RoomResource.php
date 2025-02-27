<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->name,
            'type' => $this->type,
            'prix' => $this->formatted_price,
            'statut' => ucfirst($this->status),
            'créé_le' => $this->created_at->format('d-m-Y'),
        ];
    }
}

