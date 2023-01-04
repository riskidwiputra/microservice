<?php

namespace App\Modules\order\Interfaces;
interface OrderRepositoryInterface
{
    public function create(
        $user_id,
        $product_id
    );

    public function update($data, $id);
    public function getAll($user_id);
}
