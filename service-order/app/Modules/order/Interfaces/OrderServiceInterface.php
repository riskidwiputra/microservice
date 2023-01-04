<?php

namespace App\Modules\order\Interfaces;
interface OrderServiceInterface
{
    public function store($product,$user);
    public function getall($user_id);

}
