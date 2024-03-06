<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function getById($objId);

    public function delete($objId);

    public function create(array $objData);

    public function update($objId, array $objData);
}
