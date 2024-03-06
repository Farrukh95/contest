<?php

namespace App\Repositories\QuoteType;

use App\Models\Group;
use App\Models\QuoteType;
use App\Repositories\RepositoryAbstract;

class QuoteTypeRepository extends RepositoryAbstract
{
    public function __construct(QuoteType $model)
    {
        parent::__construct($model);
    }
}
