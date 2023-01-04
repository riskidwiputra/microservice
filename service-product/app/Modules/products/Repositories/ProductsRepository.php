<?php

namespace App\Modules\products\Repositories;

use App\Models\products;
use App\Modules\products\Interfaces\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    protected $Products;

    public function __construct(products $Products)
    {
        $this->Products = $Products;
    }

    public function create(
        $name,
        $description,
        $price
    )
    {
        return $this->Products->create([
            'name'          => $name,
            'description'   => $description,
            'price'         => $price
        ]);
    }

    public function findById($id){
        return $this->Products->where('id',$id)->first();
    }
    public function update($data, $id)
    {
        return $this->Products->where('id',$id)->update($data);
    }

    public function getAll(){
        return $this->Products->paginate(10);
    }

    public function delete($id)
    {
        return $this->Products->where('id', $id)->delete();
    }

    
}
