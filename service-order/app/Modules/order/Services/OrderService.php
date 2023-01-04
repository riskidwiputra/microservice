<?php
namespace App\Modules\order\Services;

use App\Modules\order\Interfaces\OrderRepositoryInterface;
use App\Modules\order\Interfaces\OrderServiceInterface;
use App\Modules\order\Services\MidtransService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService implements OrderServiceInterface
{
    protected 
    $OrderRepository,
    $MidtransService;   

    public function __construct(
        OrderRepositoryInterface $OrderRepository
    )
    {
        $this->OrderRepository = $OrderRepository;
        $this->MidtransService =  new MidtransService;
    }
    public function getall($user_id){
        try{

            return $this->OrderRepository->getAll(
               $user_id
            );

        } catch (\Exception $e) {

            DB::rollBack();

            throw new Exception($e->getMessage(), 409);
        }
    }

    public function store($product,$user)
    {
        try {

            DB::beginTransaction();

           $order = $this->OrderRepository->create(
                $user['id'],
                $product['id']
            );

            $transactionDetails = [
                'order_id' => $order->id.'-'.Str::random(5),
                'gross_amount' => $product['price']
            ];

            $itemDetails = [
                [
                    'id' => $product['id'],
                    'price' => $product['price'],
                    'quantity' => 1,
                    'name' => $product['name']
                ]
            ];
            
            $customerDetails = [
                'first_name' => $user['name'],
                'email' => $user['email']
            ];

            $midtransParams = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails
            ];

            $midtransSnapUrl = $this->MidtransService->getMidtransSnapUrl($midtransParams);

            $order->snap_url = $midtransSnapUrl;

            $order->metadata = [
                    'product_id' => $product['id'],
                    'product_price' => $product['price'],
                    'product_name' => $product['name'],
                    'product_description' => $product['description'],
                ];
    
            $order->save();

            DB::commit();

            return $order;

        } catch (\Exception $e) {

            DB::rollBack();

            throw new Exception($e->getMessage(), 409);
        }

    }
   
}
