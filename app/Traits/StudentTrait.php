<?php

namespace App\Traits;

trait StudentTrait
{
    public function getFioAttribute(): string
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;

    }
}
