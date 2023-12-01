<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServiceOrderRequest;

class ServiceOrderRepository{

	public function __construct()
    {
    }

    public function listarServiceOrder()
    {
        $serviceOrders = ServiceOrder::with('user:id,name')->paginate(5);

        return response()->json([
            'data' => $serviceOrders->items(),
            'current_page' => $serviceOrders->currentPage(),
            'last_page' => $serviceOrders->lastPage(),
        ]);
    }

    public function criarServiceOrder(ServiceOrderRequest $request)
    {
        DB::beginTransaction();
        
        try {

            $serviceOrder = ServiceOrder::create(
            [
                'vehiclePlate' => $request->vehiclePlate,
                'entryDateTime' => $request->entryDateTime, 
                'exitDateTime' => $request->exitDateTime,
                'priceType' => $request->priceType,
                'price' => $request->price,
                'userId' => $request->userId
            ]
            );

            DB::commit();

			return response()->json(['message' => 'Ordem de serviço cadastrada com sucesso.', 'data' => $serviceOrder]);
		} catch (\Exception $e) {
            DB::rollback();
			return response()->json(['error' => $e]);
		}
	}

    public function editarServiceOrder(ServiceOrderRequest $request, $serviceOrderId)
    {
        $serviceOrder = ServiceOrder::find($serviceOrderId);

        if (!$serviceOrder) {
            return response()->json(['error' => 'Ordem de serviço não encontrada.'], 404);
        }

        DB::beginTransaction();

		try {

			$dataServiceOrder = array();

            if ($request->has('vehiclePlate')) {
                $dataServiceOrder['vehiclePlate'] = $request->input('vehiclePlate');
            }
        
            if ($request->has('price')) {
                $dataServiceOrder['price'] = $request->input('price');
            }
            
			$serviceOrderAtualizacao = ServiceOrder
				::where('id', $serviceOrderId)
				->update($dataServiceOrder);

			$serviceOrderAtualizado = ServiceOrder::find($serviceOrderId);

			DB::commit();

			return response()->json($serviceOrderAtualizado);
		} catch (\Exception $e) {
			DB::rollback();
			return response()->json(['error' => $e]);
		}
    }

    public function deletarServiceOrder($serviceOrderId)
    {
        $serviceOrder = ServiceOrder::find($serviceOrderId);

        if (!$serviceOrder) {
            return response()->json(['message' => 'Ordem de serviço não encontrada.'], 404);
        }

        $serviceOrder->delete();

        return response()->json(['message' => 'Ordem de serviço excluída com sucesso.'], 200);
    }
}