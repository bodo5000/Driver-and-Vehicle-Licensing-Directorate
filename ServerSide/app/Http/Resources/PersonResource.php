<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'National_No' => $this->national_no,
            'FirstName' => $this->first_name,
            'SecondName' => $this->second_name,
            'ThirdName' => $this->third_name,
            'Last_name' => $this->last_name,
            'Gender' => $this->gender,
            'DateOfBirth' => $this->date_of_birth,
            'Email' => $this->email,
            'Phone' => $this->phone,
            'Address' => $this->address,
            'PersonalImage' => $this->image ? asset("storage/{$this->image}") : null
        ];
    }
}
