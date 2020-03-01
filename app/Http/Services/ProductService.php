<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/23/2018
 * Time: 4:23 PM
 */
namespace App\Http\Services;

use App\Http\Interfaces\ProductRepositoryInterface;

class ProductService extends Service
{
    public function interface()
    {
        return ProductRepositoryInterface::class;
    }

    public function products()
    {
        return $this->interface->products();
    }

    public function storeProducts($data)
    {
        return $this->interface->storeProducts($data->all());
    }

    public function updateProducts($request, $id)
    {
        return $this->interface->updateProducts($request, $id);
    }

    public function newProductFeeDetailProcess($data)
    {
        return $this->interface->newProductFeeDetailProcess($data);

    }
    public function updateProductFeeDetail($data,$id)
    {
        return $this->interface->updateProductFeeDetail($data,$id);
    }
}