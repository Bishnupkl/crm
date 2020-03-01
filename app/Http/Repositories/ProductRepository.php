<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/23/2018
 * Time: 4:26 PM
 */

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ProductFee;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function products()
    {
        return $this->model->get();
    }

    public function storeProducts($data)
    {
        $product = Product::create($this->productJSON($data));

        if ($product){
            $product->productFee()->create($this->feeJSON($data));
        }

        return $product;
    }

    public function updateProducts($request,$id)
    {
        $data = $request->all();
        ProductFee::find($id)->update($request->all());
        return Product::find($id)->update($this->productJSON($data));

    }

    public function newProductFeeDetailProcess($data)
    {
        $product = $this->model->where('id',$data['product_id'])->first();
        return $product->productFee()->create($this->feeJSON($data));
    }

    public function updateProductFeeDetail($data,$id)
    {
        unset($data['id']);
        $detail = $this->model->whereHas(
            'productFee',
            function ($query) use($id){
                $query->where('id',$id);
            }
        )->first();

        if ($detail) {
            if($detail->productFee()->where('id', $id)->update($data)){
                return $detail;
            }
        }
        return 0;

    }

    protected function feeJSON($data)
    {
        return [
            'fee_type' => $data['fee_type'],
            'fee_amount' => $data['fee_amount'],
            'fee_term' => $data['fee_term'],
        ];

    }
    protected function productJSON($data)
    {
        return [
            'course_id'         => array_get($data,'course_name',null),
            'partner_id'        => array_get($data,'partner_name',null),
            'intake_id'         => array_get($data,'intake',null),
            'duration'          => array_get($data,'duration',null),
            'description'       => array_get($data,'description',null)
        ];
    }
}