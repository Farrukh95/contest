<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_start',
        'date_end'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
