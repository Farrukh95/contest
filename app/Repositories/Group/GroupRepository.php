<?php

namespace App\Repositories\Group;

use App\Models\Group;
use App\Repositories\RepositoryAbstract;
use Illuminate\Database\Eloquent\Model;

class GroupRepository extends RepositoryAbstract
{
    public function __construct(Group $model)
    {
        parent::__construct($model);
    }
}
