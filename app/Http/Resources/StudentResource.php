<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'group_id' => $this->group_id,
            'group_name' => $this->group->name,
            'quote_type_id' => $this->quote_type_id,
            'quote_type_name' => $this->quote_type->name,
            'rating' => $this->rating,
            'entrance_exam_results' => $this->entrance_exam_results,
            'average_exam_score' => $this->average_exam_score,
            'average_subject_score' => $this->average_subject_score,
            'entrance_test_results' => $this->entrance_test_results,
            'is_disabled' => $this->is_disabled,
            'additional_score' => $this->additional_score,
            'application' => $this->application,
        ];
    }
}
