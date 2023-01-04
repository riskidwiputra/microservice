<?php

namespace App\Http\Controllers;

use App\Modules\order\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected
    $OrderService;

    public function __construct(
        OrderServiceInterface $OrderService
        )
    {
        $this->OrderService = $OrderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{

            $userId = $request->input('user_id');

            $getData = $this->OrderService->getall($userId);

            return response()->json([
                'status' => 'success',
            'data' => $getData
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
        
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $user = $request->input('user');
            $product = $request->input('product');

            $order = $this->OrderService->store($product,$user);

            return response()->json([
                'status'    => true,
                'message'   => $order
            ],201);

         } catch (\Throwable $e) {

            return response()->json([
                'status'  => false,
                'message' => "Data Order Gagal Ditambahkan",
                'error'   => $e->getMessage()
            ], $e->getCode() != 0 ? $e->getCode() : 409);
         
        }
    }

}
