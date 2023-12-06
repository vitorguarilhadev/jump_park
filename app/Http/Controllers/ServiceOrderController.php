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
    
    /**
    * @OA\GET(
    *  tags={"LISTAR"},
    *  summary="Listar ordens de serviço",
    *  description="Esse endpoint retorna uma lista das ordens de serviço cadastradas",
    *  path="/api/service_order",
    *  security={ {"bearerToken":{}} },
    *  @OA\Parameter(
    *      name="page",
    *      in="query",
    *      description="Número da página",
    *      required=false,
    *      @OA\Schema(type="integer")
    *  ),
    *  @OA\Parameter(
    *      name="vehiclePlate",
    *      in="query",
    *      description="Placa do veículo",
    *      required=false,
    *      @OA\Schema(type="string")
    *  ),
    *  @OA\Response(
    *    response=200,
    *    description="Operação concluída com sucesso",
    *  )
    * )
    */

    public function criarServiceOrder(ServiceOrderRequest $request)
    {
        return $this->serviceOrderRepository->criarServiceOrder($request);
    }

    /**
    * @OA\POST(
    *   tags={"CRIAR"},
    *   summary="Criar nova ordem de serviço",
    *   description="Esse endpoint cria uma nova ordem de serviço",
    *   path="/api/service_order",
    *   security={ {"bearerToken":{}} },
    *   @OA\RequestBody(
    *      @OA\MediaType(
    *          mediaType="application/json",
    *          @OA\Schema(
    *              required={"vehiclePlate", "entryDateTime", "exitDateTime", "priceType", "price", "userId"},
    *              @OA\Property(property="vehiclePlate", type="char", example="VVV7777"),
    *              @OA\Property(property="entryDateTime", type="dateTime", example="0001-01-01 00:00:00"),
    *              @OA\Property(property="exitDateTime", type="string", example="0001-01-01 00:00:00"),
    *              @OA\Property(property="priceType", type="string", example="NOITE"),
    *              @OA\Property(property="price", type="decimal", example="40"),
    *              @OA\Property(property="userId", type="unsignedBigInteger", example="1"),
    *          )
    *      ),
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Ordem de serviço criada com sucesso",
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Erro de validação",
    *   )
    * )
    */

    public function editarServiceOrder(ServiceOrderRequest $request, $serviceOrderId)
    {
        return $this->serviceOrderRepository->editarServiceOrder($request, $serviceOrderId);
    }

    /**
    * @OA\PUT(
    *   tags={"EDITAR"},
    *   summary="Editar ordem de serviço",
    *   description="Esse endpoint edita uma ordem de serviço",
    *   path="/api/service_order/{service_order_id}",
    *   security={ {"bearerToken":{}} },
    *   @OA\Parameter(
    *      name="service_order_id",
    *      in="path",
    *      description="ID da ordem de serviço a ser editada",
    *      required=true,
    *      @OA\Schema(
    *          type="integer",
    *          format="int64"
    *      ),
    *   ),
    *   @OA\RequestBody(
    *      @OA\MediaType(
    *          mediaType="application/json",
    *          @OA\Schema(
    *              @OA\Property(property="vehiclePlate", type="char", example="VVV7777"),
    *              @OA\Property(property="price", type="decimal", example="40"),
    *          )
    *      ),
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Ordem de serviço editada com sucesso",
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Erro de validação",
    *   )
    * )
    */

    public function deletarServiceOrder($serviceOrderId)
    { 
        return $this->serviceOrderRepository->deletarServiceOrder($serviceOrderId);
    }

    /**
    * @OA\DELETE(
    *   tags={"DELETAR"},
    *   summary="Deletar ordem de serviço",
    *   description="Esse endpoint deleta uma ordem de serviço",
    *   path="/api/service_order/{serviceOrderId}",
    *   security={ {"bearerToken":{}} },
    *   @OA\Parameter(
    *      name="serviceOrderId",
    *      in="path",
    *      description="ID da ordem de serviço a ser deletada",
    *      required=true,
    *      @OA\Schema(
    *          type="integer",
    *          format="int64"
    *      ),
    *   ),
    *   @OA\Response(
    *      response=200,
    *      description="Ordem de serviço deletada com sucesso",
    *   ),
    *   @OA\Response(
    *      response=422,
    *      description="Erro de validação",
    *   )
    * )
    */

}
