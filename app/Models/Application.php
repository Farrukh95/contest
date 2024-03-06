<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'contest_id',
        'module_priority_1',
        'module_priority_2',
        'application_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function modulePriority1()
    {
        return $this->belongsTo(Module::class, 'module_priority_1', 'id');
    }

    public function modulePriority2()
    {
        return $this->belongsTo(Module::class, 'module_priority_2', 'id');
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}
