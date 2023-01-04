<?php

namespace App\Modules\order\Repositories;

use App\Models\Order;
use App\Modules\order\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $Order;

    public function __construct(Order $Order)
    {
        $this->Order = $Order;
    }

    public function create(
        $user_id,
        $product_id
    )
    {
        return $this->Order->create([
            'user_id'          => $user_id,
            'product_id'   => $product_id
        ]);
    }

    public function update($data, $id)
    {
        $this->Order->snap_url = $data['snap_url'];

        $this->Order->metadata = $data['metadata'];

        return $this->Order->save();
    }
    
    public function getAll($user_id){
        return $this->Order->when($user_id, function($query) use ($user_id) {
            return $query->where('user_id', '=', $user_id);
        })->get();

    }
}
