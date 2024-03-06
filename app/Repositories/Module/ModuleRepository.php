<?php

namespace App\Repositories\Module;

use App\Models\Module;
use App\Repositories\RepositoryAbstract;

class ModuleRepository extends RepositoryAbstract
{
    public function __construct(Module $model)
    {
        parent::__construct($model);
    }

    public function getFilteredModules($objId)
    {
        return $this->model->where('module_type_id', '!=', $objId)->get();
    }
}
