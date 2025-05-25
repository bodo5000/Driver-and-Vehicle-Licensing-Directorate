<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'personInfo' => [
                'fullName' => "{$this->person->first_name} {$this->person->second_name} {$this->person->third_name} {$this->person->last_name}",
                "nationalNo" => $this->person->national_no,
            ],
            'createdBy' => $this->user->username,
            'applicationTypeName' => $this->applicationType->title,
            'paid_fees' => $this->paid_feed,
        ];
    }
}
