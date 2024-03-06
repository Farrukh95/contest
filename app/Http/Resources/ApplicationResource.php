<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'id' => $this->id,
            'application_date' => Carbon::parse($this->application_date)->format('d.m.Y'),
            'student_id' => $this->student_id,
            'student_fio' => $this->student->fio,
            'module_priority_1' => $this->module_priority_1,
            'module_priority_name_1' => $this->modulePriority1->name,
            'module_priority_2' => $this->module_priority_2,
            'module_priority_name_2' => $this->modulePriority2->name,
            'contest_id' => $this->contest_id,
            'contest_name' => $this->contest->name,
        ];
    }
}
