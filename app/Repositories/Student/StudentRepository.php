<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\RepositoryAbstract;

class StudentRepository extends RepositoryAbstract
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }
}
