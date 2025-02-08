<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(private readonly User $model) {}

    public function getUser($id)
    {
       return $this->getModel()
           ->with('role')
           ->with('department')
           ->find($id);
    }

    private function getModel()
    {
        return $this->model;
    }
}
