<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;

class StatusController extends Controller
{
    public function __construct(private readonly Status $model){}

    public function getAllStatuses()
    {
        return $this->getModel()->all();
    }

    private function getModel()
    {
        return $this->model;
    }
}
