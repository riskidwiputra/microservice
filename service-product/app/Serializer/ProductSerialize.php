<?php 

namespace App\Serializer;

use Illuminate\Support\Facades\Auth;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Pagination\PaginatorInterface;
// use League\Fractal\Serializer\SerializerAbstract;

class ProductSerialize extends ArraySerializer 
{

	// // public function collection($resourceKey, array $data)
    // // {
    // //     return [
    // //         'status'    => true,
    // //         'data'      => $data
    // //     ];
    // // }

    // // public function item($resourceKey, array $data)
    // // {
    // //     return ['data' => $data];
    // // }

    // // public function null()
    // // {
    // //     return ['data' => []];
    // // }

    // public function paginator(PaginatorInterface $paginator)
    // {
    //     $currentPage = (int) $paginator->getCurrentPage();
    //     $lastPage = (int) $paginator->getLastPage();

    //     $pagination = [
    //         'total' => (int) $paginator->getTotal(),
    //         'count' => (int) $paginator->getCount(),
    //         'per_page' => (int) $paginator->getPerPage(),
    //         'current_page' => $currentPage,
    //         'total_pages' => $lastPage,
    //     ];


    //     return ['pagination' => $pagination];
    // }

    /**
     * Serialize a collection.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return $data;
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return $data;
    }

    /**
     * Serialize null resource.
     *
     * @return array
     */
    public function null()
    {
        return [];
    }

}