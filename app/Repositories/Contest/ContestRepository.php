<?php

namespace App\Repositories\Contest;

use App\Models\Contest;
use App\Repositories\RepositoryAbstract;

class ContestRepository extends RepositoryAbstract
{
    public function __construct(Contest $model)
    {
        parent::__construct($model);
    }
}
