<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    public function __construct(private readonly RequestModel $model){}

    public function getAllRequests($userId)
    {
        return $this->defaultQueryRequest()
            ->where('user_id', $userId)
            ->get();
    }

    public function showRequest($requestId)
    {
        return $this->defaultQueryRequest()
            ->where('id', $requestId)
            ->get();
    }

    public function defaultQueryRequest()
    {
        return $this->getModel()
            ->newQuery()
            ->with(['responsibles', 'responsibles.user'])
            ->with('user')
            ->with('status');
    }


    private function getModel()
    {
        return $this->model;
    }

}
