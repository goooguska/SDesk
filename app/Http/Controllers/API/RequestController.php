<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusRequestEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCreateRequestModel;
use App\Http\Requests\ValidateUpdateRequestModel;
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

    public function createRequest(ValidateCreateRequestModel $request)
    {
        $fields = $request->all();
        $fields['status_id'] = StatusRequestEnum::NEW;

        $created = $this->getModel()->create($fields);

        if ($created){
            return response()->json([
                'message' => 'Заявка успешно создана.',
            ], 201);
        }
    }

    public function updateRequest(ValidateUpdateRequestModel $request, $id)
    {
        $fields = $request->only(['status_id']);
        $updated = $this->getModel()
            ->newQuery()
            ->where('id', $id)
            ->update($fields);

        if ($updated) {
            return response()->json([
                'message' => 'Заявка успешно обновлена.',
            ], 201);
        }
    }

    public function deleteRequest($id)
    {
        $deleted = $this->getModel()
            ->newQuery()
            ->where('id', $id)
            ->delete();

        if ($deleted){
            return response()->json([
                'message' => 'Заявка успешно удалена'
            ], 200);
        }
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
