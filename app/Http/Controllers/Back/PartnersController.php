<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\PartnerRequest;
use App\Models\Country;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::get();
//        $universities = Partner::get();

        $search = $request->search;

        if($universities = Partner::where('name','like','%'.$search.'%')
            ->orWhere('category','like','%'.$search.'%')
            ->orWhere('street','like','%'.$search.'%')
            ->orWhere('city','like','%'.$search.'%')
            ->orWhere('state','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->orWhere('fax','like','%'.$search.'%')
            ->orWhere('website','like','%'.$search.'%')
            ->paginate(10))
        {
            $hold = 'value';
        }

        $this->data('title',$this->title('CountrySetting'));

        return view(
            'back.pages.partners.partners' ,
            $this->data,compact('countries','universities','hold')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $universities = Partner::get();

        $this->data('title',$this->title('CountrySetting'));

        return view(
            'back.pages.partners.partners' ,
            $this->data,compact('countries','universities')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param PartnerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PartnerRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
      
        $partner = Partner::create($data);
        if($partner)
        {
            return redirect()->back()->with('success',$partner->name.' has been successfully added');
        }
        return redirect()->back()->with('error','Something went wrong while adding '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        $countries = Country::get();
        $universities = Partner::get();

        $this->data('title',$this->title('Edit Partner'));


        return view('back.pages.partners.edit-partner' ,
            $this->data,compact('partner','countries','universities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        $partner = Partner::find($id);
        if ($partner->update($data)){
            return redirect()->route('partners.index')->with('success',$partner->name.' has been successfully updated');
        }
        return redirect()->back()->with('error','Something went wrong while updating '.$request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = Partner::find($id);

        if (Partner::where('id',$id)->delete()){
            return redirect()->back()->with('success',$university->name.' has been deleted');
        }
        return redirect()->back()->with('error','Something went wrong while deleting '.$university->name);
    }
}
