<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    return [
        'title' => $this->title,
        'author_id' => $this->author_id,
        'gender_id' => $this->gender_id,
        'gender' => $this->gender->name,
        'name_author'=>$this->author->name
       
    ];
    }
}
