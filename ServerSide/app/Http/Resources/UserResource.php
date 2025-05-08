<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->id,
            'username' => $this->username,
            'isActive' => $this->isActive ? 'yes' : 'no',
            'person_info' => [
                'ID' => $this->person->id,
                'National_No' => $this->person->national_no,
                'FirstName' => $this->person->first_name,
                'SecondName' => $this->person->second_name,
                'ThirdName' => $this->person->third_name,
                'Last_name' => $this->person->last_name,
                'Gender' => $this->person->gender,
                'DateOfBirth' => $this->person->date_of_birth,
                'Email' => $this->person->email,
                'Phone' => $this->person->phone,
                'Address' => $this->person->address,
                'PersonalImage' => $this->person->image ? asset("storage/{$this->person->image}") : null
            ],
        ];
    }
}
