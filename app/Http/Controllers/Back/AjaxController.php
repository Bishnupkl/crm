<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AjaxExperienceRequest;
use App\Http\Requests\AjaxInquiryAcademicUpdateRequest;
use App\Http\Services\InquiryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $inquiryService;
    protected $productService;

    public function __construct(InquiryService $inquiryService,ProductService $productService)
    {
        $this->inquiryService = $inquiryService;
        $this->productService = $productService;
    }

    public function addNewAcademic(AjaxInquiryAcademicUpdateRequest $request)
    {
        return $this->inquiryService->academicDetailProcess($request);
    }

    public function addNewExperience(AjaxExperienceRequest $request)
    {
        return $this->inquiryService->experienceProcess($request);
    }

    public function addNewProuductFeeDetail(Request $request)
    {
        $data = $request->all();
        $this->validateProductFeeData($request);
        return $this->productService->newProductFeeDetailProcess($data);
    }

    public function updateProductFeeDetail(Request $request)
    {
        $data = $request->all();
        $this->validateProductFeeData($request);
        return $this->productService->updateProductFeeDetail($data,$request->id);

    }

    public function validateProductFeeData($request)
    {
        $validate= $request->validate([
            'fee_type'=>'required||max:20',
            'fee_amount'=>'required||numeric',
            'fee_term'=>'required',

        ]);
        return $validate;
    }


}
