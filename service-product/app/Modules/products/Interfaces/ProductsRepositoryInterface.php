<?php

namespace App\Modules\products\Interfaces;
interface ProductsRepositoryInterface
{
    public function create(
        $name,
        $description,
        $price
    );
    public function findById($id);
    public function update($data, $id);
    public function delete($id);
    public function getAll();

}
