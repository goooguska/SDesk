<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct(private readonly Role $model){}

    public function getAllRoles()
    {
        return $this->getModel()
            ->newQuery()
            ->get();
    }

    private function getModel()
    {
        return $this->model;
    }

}
