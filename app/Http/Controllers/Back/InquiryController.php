<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\InquiryRequest;
use App\Http\Services\InquiryService;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\InquiryCounselor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class InquiryController extends Controller
{
    protected $inquiryService;

    public function __construct(InquiryService $inquiryService)
    {
        $this->inquiryService = $inquiryService;
    }

    /**
     * * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $inquiries = $this->inquiryService->index($request);

        $this->data('title',$this->title('All Inquiry'));

        return view(
            'back.reception-counselor.pages.inquiry.inquiries',
            $this->data, compact('inquiries')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('Add New Inquiry'));
        $countries = Country::get();
        return view(
            'back.reception-counselor.pages.inquiry.add-inquiry',
            $this->data, compact('countries')
        );
    }

    /**
     *  Store a newly created resource in storage.
     * @param InquiryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InquiryRequest $request)
    {
        if ($this->inquiryService->storeBasicInformation($request)) {
            return redirect()->route('inquiry.index')->with(['success' => 'New inquiry has been added']);
        }
       return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $token
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        if ($detail = $this->inquiryService->showInquiryDetail($token))
        {
            $countries = Country::get();
            $counselors = User::where('morph_type','counselor')->get();
            $activeCounselor = InquiryCounselor::where([['inquiry_token',$token],['counselor_status',1]])->first();

            if ($activeCounselor)
            {
                $counselorDetail = User::find($activeCounselor->user_id);
            }
            $this->data('title',$this->title('Inquiry '.$token));
            return view(
                'back.reception-counselor.pages.inquiry.details',
                $this->data,compact('detail','countries','counselors','counselorDetail')
            );
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * * Update the specified resource in storage.
     * @param InquiryRequest $request
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InquiryRequest $request, $token)
    {
        if ($this->inquiryService->updateInquiry($request, $token)) {
            if (! empty($request->step) && $request->step === 'P3r5oN81in7r3A4Ion') {

                return redirect()->route('inquiry.show',$token.'#personalInformation')->with('success', 'Personal information has been updated for token ' . $token);
            } elseif (! empty($request->step) && $request->step === '1N73RE573Dhi57OrY') {

                return redirect('/inquiry/' . $token . '#interestHistory')->with('success', 'Personal information has been updated for token ' . $token);
            } elseif (! empty($request->step) && $request->step === '3N671SH9R02ICI3NCY') {

                return redirect('/inquiry/' . $token . '#educationExperience')->with('success', 'Personal information has been updated for token ' . $token);
            }
        }
        return redirect()->back()->with('error','Something went wrong while updating information related to '.$token);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($token)
    {
        if($this->inquiryService->destroy($token)){
            return redirect()->back()->with('success','This inquiry has been deleted');
        }
        return redirect()->back()->with('error','Error deleting this item');
    }

    public function exportInquiryDetails($token=null){
        if ($detail = $this->inquiryService->showInquiryDetail($token))
        {
                    $countries = Country::get();
                    $counselors = User::where('morph_type','counselor')->get();
                    $this->data('title',$this->title('Inquiry '.$token));
                    $pdf = PDF::loadView('back.reception-counselor.pages.inquiry.export-inquiry-details',$this->data,
                        compact('detail','countries','counselors'));
                    return $pdf->download('export-inquiry-details.pdf');
        }
        return redirect()->back();
    }


}
