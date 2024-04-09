<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibrarianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'cell_phone'=>$this->cell_phone,
            'roles'=>$this->roles->map(function ($roles){
                return [
                    'name_role'=>$roles->name
                ];
            }),

        ];
    }
}
