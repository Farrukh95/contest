<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getById($objId)
    {
        return $this->model->find($objId);
    }

    public function delete($objId)
    {
        return $this->model->destroy($objId);
    }

    public function create(array $objData)
    {
        return $this->model->create($objData);
    }

    public function update($objId, array $objData)
    {
        $object = $this->model->find($objId);

        if ($object) {
            $object->update($objData);
            return $object;
        }

        return null;
    }


}
