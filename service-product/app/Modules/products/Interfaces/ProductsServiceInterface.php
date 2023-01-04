<?php

namespace App\Modules\products\Interfaces;
interface ProductsServiceInterface
{
    public function getAll();
    public function createProducts($request);
    public function update($request,$Products);
    public function delete($id);

}
