<?php

namespace App\Repositories\Application;

use App\Models\Application;
use App\Repositories\RepositoryAbstract;

class ApplicationRepository extends RepositoryAbstract
{
    public function __construct(Application $model)
    {
        parent::__construct($model);
    }
}
