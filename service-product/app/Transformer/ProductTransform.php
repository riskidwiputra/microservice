<?php

namespace App\Transformer;

use App\Models\products;
use League\Fractal\TransformerAbstract;

class ProductTransform extends TransformerAbstract
{
  

    public function transform(products $data)
    {

        return [
            'id'            => $data->id,
            'name'          => $data->name,
            'description'   => $data->description,
            'price'         => number_format($data->price)
        ];
    }
   
}
