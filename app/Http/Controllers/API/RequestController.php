<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusRequestEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateRequestModel;
use App\Models\Request as RequestModel;
use App\Models\Responsible;

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

    public function createRequest(ValidateRequestModel $request)
    {
        $fields = $request->all();
        $fields['status_id'] = StatusRequestEnum::NEW;

        return $this->getModel()->create($fields);
    }

    private function defaultQueryRequest()
    {
        return $this->getModel()
            ->newQuery()
            ->with(['user', 'status', 'responsible']);
    }

    private function getModel()
    {
        return $this->model;
    }

}
