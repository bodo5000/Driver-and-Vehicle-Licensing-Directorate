<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DrivingTestAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'TestType_ID' => $this->test_type_id,
            'LocalDrivingLicense_ID' => $this->local_driving_license_id,
            'PaidFees' => $this->paid_fees,
            'createdBy' => $this->user->username,
            'Is_Locked' => $this->is_locked,
            'TestResult' => $this->drivingTest->result,
            'Note' => $this->drivingTest->note ?? 'No Notes'
        ];
    }
}
