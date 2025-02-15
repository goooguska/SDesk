<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Api\RequestController as ApiRequestController;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PageController extends Controller
{
    public function __construct(private readonly ApiRequestController $apiRequestController) {}

    public function create()
    {
        return Inertia::render('Requests/CreateRequest');
    }

    public function manage()
    {
        return Inertia::render('Requests/ManageRequest');
    }

    public function show($requestId)
    {
        $requestData = $this->apiRequestController->showRequest($requestId);

        if (method_exists($requestData, 'getData')) {
            $requestData = $requestData->getData(true);
        }

        return Inertia::render('Requests/ShowRequest', [
            'request' => $requestData,
        ]);
    }
}
