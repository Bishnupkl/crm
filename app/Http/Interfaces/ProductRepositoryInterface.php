<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/23/2018
 * Time: 4:24 PM
 */
namespace App\Http\Interfaces;
interface ProductRepositoryInterface extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function products();

    /**
     * @param $data
     * @return mixed
     */
    public function storeProducts($data);

    public function updateProducts($request, $id);

    public function newProductFeeDetailProcess($data);

    public function updateProductFeeDetail($data,$id);
}