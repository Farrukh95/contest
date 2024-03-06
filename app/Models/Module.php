<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function moduleType()
    {
        return $this->belongsTo(ModuleType::class);
    }

    public function getIsOpenAttribute()
    {
        return $this->total_students >= $this->min_students;
    }

    public function getFullAttribute()
    {
        return $this->total_students >= $this->max_students;
    }

    public function applicationByModule1()
    {
        return $this->hasMany(Application::class, 'module_priority_1', 'id');
    }

    public function applicationByModule2()
    {
        return $this->hasMany(Application::class, 'module_priority_2', 'id');
    }

    public function getCurStudentsModule1Attribute()
    {
        return $this->applicationByModule1->count();
    }

    public function getCurStudentsModule2Attribute()
    {
        return $this->applicationByModule2->count();
    }

    public function getTotalStudentsAttribute()
    {
        return $this->cur_students_module1 + $this->cur_students_module2;
    }

    public function freeModule()
    {
        return $this->where('module_type_id', 3)->first();
    }

    public function disciplines()
    {
      return  $this->hasMany(Discipline::class);
    }

    public function school()
    {
      return  $this->belongsTo(School::class);
    }


}
