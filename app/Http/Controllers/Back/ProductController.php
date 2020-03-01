<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Country;
use App\Models\Course;
use App\Models\Intake;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductFee;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('title',$this->title('Products'));
        $products = $this->productService->products();

        return view(
            'back.pages.products.product',
            $this->data,compact('products')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('New product'));
        $countries = Country::all();
        $intakes = Intake::all();
        $courses = Course::all();
        $partners = Partner::all();

        return view(
            'back.pages.products.new-product',
            $this->data,compact('countries','intakes','courses','partners')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function store(ProductRequest $request)
    {
        $product = $this->productService->storeProducts($request);
        if ($product){
            return redirect('products')->with('success','New product has been added');
        }

        return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data('title',$this->title('Product Details'));

        $products = Product::where('id',$id)->first();

        return view(
            'back.pages.products.product-detail-show',
            $this->data, compact('products')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $intakes = Intake::all();
        $courses = Course::all();
        $partners = Partner::get();
        $this->data('title',$this->title('Edit product'));
        $products = Product::find($id);

        return view('back.pages.products.edit-product',
            $this->data,compact('products','countries','intakes','courses','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name'=>'required',
            'partner_name'=>'required',
            'duration'=>'required',
            'description'=>'required',
            'intake'=>'required'
        ]);

        $product = $this->productService->updateProducts($request, $id);
        if ($product){
            return redirect('products')->with('success','product information has been updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $productFee = ProductFee::find($id);

        if (ProductFee::where('id',$id)->delete()&&Product::where('id',$id)->delete()){
            return redirect()->back();
        }
        return redirect()->back()->with('error','Something went wrong while deleting '.$product->name);
    }
    public function search(Request $request)
    {
        $this->data('title',$this->title('All Product'));
        $search = $request->search;

        if($products =  Product::whereHas(
            'course',
            function ($query) use($search){
                $query->where('name','like','%'.$search.'%');
            }
        )->orWhereHas(
            'partner',
            function ($query) use($search){
                $query->where('name','like','%'.$search.'%');
            }
        )->orWhereHas(
            'intake',
            function ($query) use($search){
                $query->where('name','like','%'.$search.'%');
            }
        )->orWhereHas(
            'productFee',
            function ($query) use($search){
                $query->where('fee_type','like','%'.$search.'%');
            }
        )->orWhereHas(
            'productFee',
            function ($query) use($search){
                $query->where('fee_amount','like','%'.$search.'%');
            }
        )->orWhereHas(
            'productFee',
            function ($query) use($search){
                $query->where('fee_term','like','%'.$search.'%');
            }
        )
            ->orWhere('duration','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->latest()->paginate(10)){
            $hold = 'value';
        }

        return view(
            'back.pages.products.product',
            $this->data,compact('products','hold')
        );
    }
}
