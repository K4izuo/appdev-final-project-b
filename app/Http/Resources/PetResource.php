<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'species' => $this->species,
            'breed' => $this->breed,
            'age' => $this->age,
            'gender' => $this->gender->name,
            'size' => $this->size->name,
            'color' => $this->color,
            'description' => $this->description,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'status' => $this->status->name,
            'location' => $this->location,
            'dateAdded' => $this->dateAdded,
            'vaccinated' => (bool) $this->vaccinated,
            'spayed' => (bool) $this->spayed,
        ];
    }
}
