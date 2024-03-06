<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);

    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);

    }

    public function form()
    {
        return $this->belongsTo(AcademicYear::class);

    }
}
