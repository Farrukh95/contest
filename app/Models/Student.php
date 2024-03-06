<?php

namespace App\Models;

use App\Traits\StudentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, StudentTrait;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'email',
        'group_id',
        'quote_type_id',
        'entrance_exam_results',
        'average_exam_score',
        'average_subject_score',
        'entrance_test_results',
        'is_disabled',
        'additional_score',
    ];

    public function quote_type()
    {
       return $this->belongsTo(QuoteType::class);
    }

    public function group()
    {
       return $this->belongsTo(Group::class);
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }
}
