<?php
namespace App\Modules\products\Services;

use App\Modules\products\Interfaces\ProductsRepositoryInterface;
use App\Modules\products\Interfaces\ProductsServiceInterface;
use Exception;

class ProductsService implements ProductsServiceInterface
{
    protected 
    $ProductsRepository;

    public function __construct(
        ProductsRepositoryInterface $ProductsRepository
    )
    {
        $this->ProductsRepository = $ProductsRepository;
    }

    public function getAll(){
        
        try{
            return $this->ProductsRepository->getAll();

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function createProducts($request)
    {
        try {
    
            return  $this->ProductsRepository->create(
                $request->name,
                $request->description,
                $request->price,
            );

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), 409);
        }

    }

    public function update($request, $products){

        try {
             
            if(!$this->ProductsRepository->findById($products->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }
            $data = [
               'name'   => $request->name,
               'description' => $request->description,
               'price'  => $request->price,

            ];
            return  $this->ProductsRepository->update($data,$products->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }

    public function delete($product){
        try {
             
            if(!$this->ProductsRepository->findById($product->id)){
                throw new \Exception("Product Tidak Ditemukan", 404);
            }

            return  $this->ProductsRepository->delete($product->id);

        } catch (\Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode() ?? 409);
        }
    }

   
}
