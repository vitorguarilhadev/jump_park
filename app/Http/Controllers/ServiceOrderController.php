<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceOrderRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceOrderRequest;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{

    protected $serviceOrderRepository;

    public function __construct(ServiceOrderRepository $serviceOrderRepository)
    {
        $this->serviceOrderRepository = $serviceOrderRepository;
    }

    public function listarServiceOrder(Request $request)
    {
        return $this->serviceOrderRepository->listarServiceOrder($request);
    }

    public function criarServiceOrder(ServiceOrderRequest $request)
    {
        return $this->serviceOrderRepository->criarServiceOrder($request);
    }

    public function editarServiceOrder(ServiceOrderRequest $request, $serviceOrderId)
    {
        return $this->serviceOrderRepository->editarServiceOrder($request, $serviceOrderId);
    }

    public function deletarServiceOrder($serviceOrderId)
    { 
        return $this->serviceOrderRepository->deletarServiceOrder($serviceOrderId);
    }

}
